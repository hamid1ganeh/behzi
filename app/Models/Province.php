<?php

namespace App\Models;

use App\Enums\ProvinceStatus;
use Illuminate\Database\Eloquent\Model;
use Kyslik\LaravelFilterable\Filterable;

/**
 * App\Models\Province
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Province whereStatus($value)
 * @mixin \Eloquent
 */
class Province extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'status'
    ];

    use Filterable;

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function province_meta()
    {
        return $this->hasOne(ProvinceMeta::class);
    }

    public function scopeActiveStatus($query)
    {
        return $query->where('status', ProvinceStatus::Active);
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

    public function getStatus()
    {
        return $this->status;
    }

    //

    public function getNumberOfCities()
    {
        return $this->cities->count();
    }

}
