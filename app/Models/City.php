<?php

namespace App\Models;

use App\Enums\CityStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\City
 *
 * @property int $id
 * @property int|null $province_id
 * @property string|null $name
 * @property int|null $status
 * @property-read \App\Models\Province|null $province
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereStatus($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'province_id',
        'name',
        'status'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function scopeActiveStatus($query)
    {
        return $query->where('status', CityStatus::Active);
    }

    //

    public function getId()
    {
        return $this->id;
    }

    public function getProvinceId()
    {
        return $this->province_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
