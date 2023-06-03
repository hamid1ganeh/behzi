<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PageWorkTime
 *
 * @property int $id
 * @property int|null $page_id
 * @property int|null $week_day_id
 * @property string|null $startTime
 * @property string|null $endTime
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Page|null $page
 * @property-read \App\Models\WeekDay|null $week_day
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageWorkTime whereWeekDayId($value)
 * @mixin \Eloquent
 */
class PageWorkTime extends Model
{
    protected $table = 'page_work_times';

    protected $fillable = [
        'page_id',
        'week_day_id',
        'startTime',
        'endTime',
        'status',
    ];

    // relationships method

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function week_day()
    {
        return $this->belongsTo(WeekDay::class);
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

    public function getWeekDayId()
    {
        return $this->week_day_id;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function getStatus()
    {
        return $this->status;
    }

}
