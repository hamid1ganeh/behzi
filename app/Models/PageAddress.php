<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

/**
 * App\Models\PageAddress
 *
 * @property int $id
 * @property int|null $page_id
 * @property int|null $city_id
 * @property string|null $address
 * @property float|null $lat
 * @property float|null $lng
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Page|null $page
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PageAddress extends Model
{
    protected $table = 'page_addresses';

    protected $fillable = [
        'page_id',
        'city_id',
        'name',
        'address',
        'lat',
        'lng',
        'status',
    ];

    use BelongsToThrough;

    // relationships method

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsToThrough(Province::class, City::class);
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

    public function getProvinceId()
    {
        return $this->province_id;
    }

    public function getCityId()
    {
        return $this->city_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function getStatus()
    {
        return $this->status;
    }

}