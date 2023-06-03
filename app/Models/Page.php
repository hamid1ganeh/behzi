<?php

namespace App\Models;

use App\Enums\PageConnectionStatus;
use App\Enums\PageConnectionType;
use App\Enums\PageGalleryStatus;
use App\Enums\PageStatus;
use App\Enums\UserTypeStatus;
use App\Models\Traits\SitemapableTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\LaravelFilterable\Filterable;
use Kyslik\LaravelFilterable\FilterContract;
use Morilog\Jalali\Jalalian;
use Znck\Eloquent\Traits\BelongsToThrough;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property int $work_item_id
 * @property string|null $code
 * @property string|null $name
 * @property string $slug
 * @property string|null $description
 * @property int|null $level
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $expire_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read PageAddress|null $address
 * @property-read Collection|PageConnection[] $page_connections
 * @property-read int|null $page_connections_count
 * @property-read Collection|PageGallery[] $page_galleries
 * @property-read int|null $page_galleries_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @property-read WorkItem $work_item
 * @property-read Collection|PageWorkTime[] $work_times
 * @property-read int|null $work_times_count
 * @method static Builder|Page filter(FilterContract $filter)
 * @method static Builder|Page findSimilarSlugs($attribute, $config, $slug)
 * @method static Builder|Page newModelQuery()
 * @method static Builder|Page newQuery()
 * @method static Builder|Page query()
 * @method static Builder|Page whereCode($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereDescription($value)
 * @method static Builder|Page whereExpireDate($value)
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereLevel($value)
 * @method static Builder|Page whereName($value)
 * @method static Builder|Page whereSlug($value)
 * @method static Builder|Page whereStartDate($value)
 * @method static Builder|Page whereStatus($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static Builder|Page whereWorkItemId($value)
 * @mixin Eloquent
 */
class Page extends Model
{
    use Filterable;
    use Sluggable;
    use SoftDeletes;
    use BelongsToThrough;
    use SitemapableTrait;

    protected $table = 'pages';

    protected $fillable = [
        'work_item_id',
        'code',
        'name',
        'slug',
        'description',
        'level',
        'status',
        'start_date',
        'expire_date',
        'rate',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'expire_date' => 'datetime',
    ];

    // overridden methods

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // scope methods

    public function scopeActiveStatus(Builder $query)
    {
        return $query->where('status', PageStatus::Active);
    }


    // mutator methods

    // accessor methods


    // question methods

    public function isOpenNow()
    {
        $page = $this;
        $jalalianNow = Jalalian::now();
        $day_of_week = $jalalianNow->getDayOfWeek();


        $week_days_that_match_today =
            $page->work_times
                ->where('week_day.day_of_week', $day_of_week)
                ->where('status', true);

        foreach ($week_days_that_match_today as $week_day) {
            $nowInstance = Carbon::createFromFormat('H:i', $jalalianNow->format('H:i'));
            $startInstance = Carbon::createFromFormat('H:i', $week_day->startTime);
            $endInstance = Carbon::createFromFormat('H:i', $week_day->endTime);
            if (strcmp($week_day->endTime,"00:00") == 0)
            {
                $endInstance = $endInstance->addDay()->subMinute();
            }
            return $nowInstance->isBetween($startInstance, $endInstance);
        }

        return false;
    }

    public function isTheWorkTimeSet()
    {
        return $this->work_times()->count() > 0;
    }

    public function areAllWorktimesOff()
    {
        return $this->work_times()->where(['status' => false])->count() >= 7;
    }

    // computational getter methods

    public function getOwner()
    {
        return $this->users()->wherePivot('user_type', UserTypeStatus::Owner)->first();
    }

    public function getLoggedInUserRateScore()
    {
        if (auth()->check() && $this->rates()->where('user_id', auth()->id())->exists()) {
            return $this->rates()->where('user_id', auth()->id())->first()->getRate();
        }

        return 0;
    }

    public function getRateScore($getLoggedInUserRateToThisPage = false)
    {
        if ($getLoggedInUserRateToThisPage) {
            return $this->getLoggedInUserRateScore();
        }

        return $this->getRate();
    }

    public function getWorkTimesInSpecificDay($weekDay)
    {
        $workTimes = $this->work_times()->where([
            'week_day_id' => $weekDay->getID(),
            'status' => true
        ]);

        if ($workTimes->count()) {
            return $workTimes->get();
        }

        return null;

    }

    public function getPageStatus()
    {
        switch ($this->getStatus()) {
            case PageStatus::Active:
                return [
                    'name' => trans('statuses/page.' . PageStatus::Active),
                    'class' => 'success'
                ];
                break;
            case PageStatus::Ban:
                return [
                    'name' => trans('statuses/page.' . PageStatus::Ban),
                    'class' => 'danger'
                ];
                break;
            case PageStatus::Pending:
                return [
                    'name' => trans('statuses/page.' . PageStatus::Pending),
                    'class' => 'warning'
                ];
                break;
            case PageStatus::Inactive:
                return [
                    'name' => trans('statuses/page.' . PageStatus::Inactive),
                    'class' => 'dark'
                ];
                break;
            default:
                return [

                ];
        }
    }

    public function getConnectionValue($pageConnectionType)
    {
        $pageConnection = $this->page_connections->where('type', $pageConnectionType)->where('status', PageConnectionStatus::ENABLE)->first();

        if ($pageConnection) {
            return $pageConnection->getValue();
        }

        return null;
    }

    public function getNumberOfGalleries()
    {

        return $this
            ->page_galleries()
            ->withCount('page_gallery_images')
            ->has('page_gallery_images', '!=', 0)
            ->where('status', PageGalleryStatus::Approved)
            ->where('deleted_at', null)
            ->count();
    }

    public function getConnectionsCount()
    {
        return $this->phones()->count();
    }

    public static function isTheLastPageAwaitingApproval()
    {
        $lastPage = auth()->user()->pages()->orderBy('created_at', 'desc')->first();

        if($lastPage) {
            return $lastPage->getStatus() == PageStatus::Pending;
        }

        return false;
    }

    public function getJalaliStartDate()
    {
        return Jalalian::forge($this->getStartDate())->format('%A, %d %B %Y');
    }

    public function getJalaliExpireDate()
    {
        return Jalalian::forge($this->getExpireDate())->format('%A, %d %B %Y');
    }

    public function getJalaliCreatedAtDate()
    {
        return Jalalian::forge($this->getCreatedAtDate())->format('%A, %d %B %Y');
    }

    public function getJalaliUpdatedAtDate()
    {
        return Jalalian::forge($this->getUpdatedAtDate())->format('%A, %d %B %Y');
    }

    public function getRemainingDays()
    {
        return Carbon::now()->diffInDays($this->getExpireDate());
    }

    public function getPageImage($size = 'original', $urlFormat = true)
    {
        $image = $this->image;

        if ($image) {
            $imageName = $image->name[$size];
            $path = 'storage/images/';
            $imagePath = $path . $imageName;
            return $urlFormat ? url($imagePath) : $imageName;
        }

        return 'notfount.jpg';
    }

    // computational setter methods

    public function setOwner(User $user)
    {
        $this->users()->detach($this->getOwner());
        $this->users()->attach($user->id, ['user_type' => UserTypeStatus::Owner]);
    }

    // relationships method

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function work_item()
    {
        return $this->belongsTo(WorkItem::class);
    }

    public function work_category()
    {
        return $this->belongsToThrough(WorkCategory::class, WorkItem::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'page_user')->using(PageUser::class)->withPivot('user_type')->withTimestamps();
    }

    public function address()
    {
        return $this->hasOne(PageAddress::class);
    }

    public function work_times()
    {
        return $this->hasMany(PageWorkTime::class);
    }

    public function page_galleries()
    {
        return $this->hasMany(PageGallery::class);
    }

    public function page_connections()
    {
        return $this->hasMany(PageConnection::class);
    }

    public function rates()
    {
        return $this->hasMany(PageRate::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getWorkItemId()
    {
        return $this->work_item_id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function getExpireDate()
    {
        return $this->expire_date;
    }

    public function getCreatedAtDate()
    {
        return $this->created_at;
    }

    public function getUpdatedAtDate()
    {
        return $this->updated_at;
    }

    public function getRate()
    {
        return $this->rate;
    }

    //visit functions

    public function visits()
    {
        return visits($this);
    }

    //

    public function getSitemapUrl()
    {
        return route('front.pages.show', $this->getSlug());
    }
    public function domain()
    {
        return $this->hasOne(Domain::class);
    }
    public function tenant_messages()
    {
        return $this->hasMany(TenantMessage::class);
    }
}
