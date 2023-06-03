<?php

namespace App\Models;

use App\Enums\WorkCategoryStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\LaravelFilterable\Filterable;

/**
 * App\Models\WorkCategory
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WorkItem[] $work_items
 * @property-read int|null $work_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WorkCategory extends Model
{
    use Filterable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'status'
    ];

    public function work_items()
    {
        return $this->hasMany(WorkItem::class);
    }

    public function users()
    {
        return $this->hasManyThrough(Page::class,WorkItem::class);
    }

    public function pages()
    {
        return $this->hasManyThrough(Page::class, WorkItem::class, 'work_category_id', 'work_item_id');
    }

    //

    public function scopeActiveStatus($query)
    {
        return $query->where('status', WorkCategoryStatus::Active);
    }

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
       return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getNumberOfWorkItems()
    {
        return $this->work_items->count();
    }

    public function getNumberOfPages()
    {
        return $this->pages->count();
    }
}
