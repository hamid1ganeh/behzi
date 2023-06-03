<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Kyslik\LaravelFilterable\Exceptions\InvalidSettingsException;
use Kyslik\LaravelFilterable\Generic\Filter;

class PageFilter extends Filter
{
    /**
     * Defines columns that end-user may filter by.
     *
     * @var array
     */
    protected $filterables = [];


    /**
     * Define allowed generics, and for which fields.
     * Read more in the documentation https://github.com/Kyslik/laravel-filterable#additional-configuration
     *
     * @return void
     */
    protected function settings()
    {

    }

    public function filterMap(): array
    {
        return [
            'workItem' => ['work_item'],
            'workCategory' => ['work_category'],
            'city' => ['city'],
            'province' => ['province'],
            'name' => ['name'],
            'weekDay' => ['week_day'],
            'sort' => ['sort'],
        ];
    }

    public function workItem($id=null)
    {
        if($id) {
            return $this->builder->where('work_item_id', $id);
        }

        return $this->builder;
    }

    public function workCategory($id=null)
    {
        if($id) {
            return $this->builder->whereHas('work_item', function(Builder $builder) use($id){
                return $builder->where('work_category_id', $id);
            });
        }

        return $this->builder;
    }

    public function city($id=null)
    {
        if($id) {
            return $this->builder->whereHas('address', function(Builder $builder) use($id){
                return $builder->where('city_id', $id);
            });
        }

        return $this->builder;
    }

    public function province($id=null)
    {
        if($id) {
            return $this->builder->whereHas('address.city', function(Builder $builder) use($id){
                return $builder->where('province_id', $id);
            });
        }

        return $this->builder;

    }

    public function name($name=null)
    {
        if($name) {
            return $this->builder->where('name', 'LIKE', '%' . $name . '%');
        }

        return $this->builder;
    }

    public function weekDay($days)
    {
        if($days) {
            foreach($days as $day) {
                $this->builder->whereHas('work_times', function (Builder $builder) use($day){
                    $builder->where('week_day_id', $day);
                });
            }
        }

        return $this->builder;
    }

    public function sort($parameter)
    {
        if (!is_null($parameter))
            return $this->builder->orderBy($parameter, 'DESC');
        return $this->builder;
    }


}
