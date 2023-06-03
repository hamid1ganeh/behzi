<?php

namespace App\Models;

use App\Enums\PageGalleryStatus;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\LaravelFilterable\Filterable;

/**
 * App\Models\PageGallery
 *
 * @property int $id
 * @property int $page_id
 * @property string|null $name
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Page $page
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PageGallery extends Model
{
    use Sluggable;
    use Filterable;
    use SoftDeletes;

    protected $table = 'page_galleries';

    protected $fillable = [
        'page_id',
        'name',
        'slug',
        'status',
    ];

    // relationships method

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function page_gallery_images()
    {
        return $this->hasMany(PageGalleryImage::class);
    }

    // overridden methods

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // scopes

    public function scopeApprovedStatus($query)
    {
        return $query->where('status', PageGalleryStatus::Approved);
    }


    // computational getter methods

    public function getAgentImage($size = 'original', $urlFormat = true)
    {
        $agent = $this->page_gallery_images->first();

        if ($agent) {
            $imageName = $agent->image->name[$size];
            $path = 'storage/images/';
            $imagePath = $path . $imageName;
            return $urlFormat ? url($imagePath) : $imageName;
        }

        return 'notfound.jpg';

    }

    public function getNumberOfImages()
    {
        return $this->page_gallery_images->count();
    }


    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getPageId()
    {
        return $this->page_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
