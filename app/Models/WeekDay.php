<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WeekDay
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $day_of_week
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeekDay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeekDay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeekDay query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeekDay whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeekDay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeekDay whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WeekDay whereStatus($value)
 * @mixin \Eloquent
 */
class WeekDay extends Model
{
    protected $table = 'week_days';

    protected $fillable = [
        'name',
        'day_of_week',
        'status'
    ];

    // table property getter

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDayOfWeek()
    {
        return $this->day_of_week;
    }
}
