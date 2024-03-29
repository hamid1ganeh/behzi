<?php

namespace App\Models;

use App\Enums\PageGalleryImageStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\LaravelFilterable\Filterable;

/**
 * App\Models\PageGalleryImage
 *
 * @property int $id
 * @property int $page_gallery_id
 * @property int|null $priority
 * @property string|null $title
 * @property string|null $alt
 * @property string|null $image
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageGallery $page_gallery
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage wherePageGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageGalleryImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PageGalleryImage extends Model
{

    use SoftDeletes;
    use Filterable;

    protected $table = 'page_gallery_images';

    protected $fillable = [
        'page_gallery_id',
        'priority',
        'status'
    ];

    // relationships method

    public function page_gallery()
    {
        return $this->belongsTo(PageGallery::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // scopes

    public function scopeApprovedStatus($query)
    {
        return $query->where('status', PageGalleryImageStatus::Approved);
    }

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getPageGalleryId()
    {
        return $this->page_gallery_id;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function getStatus()
    {
        return $this->status;
    }

    //
    protected static function booted()
    {
        parent::booted(); // TODO: Change the autogenerated stub
        self::deleting(function (PageGalleryImage $pageGalleryImage) {
            echo 'before deleting image';
            $pageGalleryImage->image()->forceDelete();
            echo 'after deleting image';
        });
    }
}
