<?php

namespace App\Models;

use App\Enums\WorkItemStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\WorkItem
 *
 * @property int $id
 * @property int $work_category_id
 * @property string|null $name
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read int|null $pages_count
 * @property-read \App\Models\WorkCategory $work_category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkItem whereWorkCategoryId($value)
 * @mixin \Eloquent
 */
class WorkItem extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'work_category_id',
        'name',
        'status'
    ];

    // scope methods

    public function scopeActiveStatus(Builder $query)
    {
        return $query->where('status', WorkItemStatus::Active);
    }

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getWorkCategoryId()
    {
        return $this->work_category_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    // relationships method

    public function work_category()
    {
        return $this->belongsTo(WorkCategory::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
