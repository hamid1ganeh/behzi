<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\LaravelFilterable\Filterable;
use Laravel\Passport\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $email
 * @property string $mobile
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $verifyCode
 * @property string|null $codeExpireTime
 * @property int|null $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Domain[] $domains
 * @property-read int|null $domains_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read int|null $pages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCodeExpireTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVerifyCode($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    use SoftDeletes;
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'email',
        'mobile',
        'email_verified_at',
        'verifyCode',
        'codeExpireTime',
        'status',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relationships method


    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_user')->using(PageUser::class)->withPivot('user_type')->withTimestamps();
    }

    public function rates()
    {
        return $this->hasMany(PageRate::class);
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function messages()
    {
        return $this->morphMany(TicketMessage::class, 'messagerable');
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    //

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function getEmailVerifiedAt()
    {
        return $this->email_verified_at;
    }

    public function getVerifyCode()
    {
        return $this->verifyCode;
    }

    public function getCodeExpireTime()
    {
        return $this->codeExpireTime;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function getCityId()
    {
        return $this->city_id;
    }

    //
    public function isTicketDepartmentOperator($department = null)
    {
        return false;
    }

    public function avatar()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getAvatar($size = 'original', $urlFormat = true)
    {
        $avatar = $this->avatar;

        if ($avatar) {
            $imageName = $avatar->name[$size];
            $path = 'storage/images/';
            $imagePath = $path . $imageName;
            return $urlFormat ? url($imagePath) : $imageName;
        }

        return 'notfount.jpg';
    }
    public function hasAvatar()
    {
        return $this->avatar()->count() == 0 ? false : true;
    }
}
