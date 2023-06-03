<?php

namespace App\Filters\Admin;

use App\Enums\UserTypeStatus;
use App\Models\User;
use App\Models\WorkCategory;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\LaravelFilterable\Filter;
use Morilog\Jalali\Jalalian;

class PageFilter extends Filter
{
    /**
     * Available Filters and their aliases.
     *
     * @return array ex: ['method-name', 'another-method' => 'alias', 'yet-another-method' => ['alias-one', 'alias-two]]
     */
    function filterMap(): array
    {
        return [
            'name' => ['name'],
            'creator' => ['creator'],
            'levels' => ['levels'],
            'statuses' => ['statuses'],
            'provinces' => ['provinces'],
            'cities' => ['cities'],
            'workCategories' => ['work_categories'],
            'workItems' => ['work_items'],
            'start_date_from' => ['start_date_from'],
            'start_date_to' => ['start_date_to'],
            'expire_date_from' => ['expire_date_from'],
            'expire_date_to' => ['expire_date_to'],
            'updated_at_from' => ['updated_at_from'],
            'updated_at_to' => ['updated_at_to'],
            'sort' => ['sort'],
            'garbageStatus' => ['garbage_status']
        ];
    }

    public function name($value)
    {
        return $this->builder->where('name', 'like', "%{$value}%");
    }

    public function creator($value)
    {

        $similarUserIds = User::where('mobile', 'like', "%{$value}%")->get()->pluck('id');

        $withPivot = $this->builder->join('page_user', 'id', '=', 'page_id');
        $withPivot = $withPivot->select(['pages.*', 'user_type', 'user_id']);

        $filteredBuilder = $withPivot->whereIn('user_id', $similarUserIds);
        $filteredBuilder = $filteredBuilder->where('user_type', UserTypeStatus::Owner);

        return $filteredBuilder;

    }

    public function levels($value)
    {
        return $this->builder->whereIn('level', $value);
    }

    public function statuses($value)
    {
        return $this->builder->whereIn('status', $value);
    }

    public function provinces($value)
    {
        $withAddress = $this->builder->join('page_addresses', 'pages.id', '=', 'page_addresses.page_id');
        $withCity = $withAddress->join('cities', 'page_addresses.city_id', '=', 'cities.id');
        $withProvince = $withCity->join('provinces', 'cities.province_id', '=', 'provinces.id');

        $withProvince = $withProvince->select(['pages.*', 'provinces.id as province_id']);

        return $withProvince->whereIn('province_id', $value);
    }

    public function cities($value)
    {
        $withAddress = $this->builder->join('page_addresses', 'pages.id', '=', 'page_addresses.page_id');
        $withCity = $withAddress->join('cities', 'page_addresses.city_id', '=', 'cities.id');

        $withProvince = $withCity->select(['pages.*', 'cities.id as city_id']);

        return $withProvince->whereIn('city_id', $value);
    }

    public function workCategories($value)
    {
        $withWorkCategory = $this->builder->join('work_items', 'pages.work_item_id', '=', 'work_items.id');
        $withWorkCategory = $withWorkCategory->join('work_categories', 'work_items.work_category_id', '=', 'work_categories.id');
        $withWorkCategory = $withWorkCategory->select(['pages.*', 'work_categories.id as work_category_id']);

        return $withWorkCategory->whereIn('work_category_id', $value);
    }

    public function workItems($value)
    {
        return $this->builder->whereIn('work_item_id', $value);
    }

    public function updated_at_from($value)
    {
        return $this->builder->where('updated_at', '>=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function updated_at_to($value)
    {
        return $this->builder->where('updated_at', '<=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function start_date_from($value)
    {
        return $this->builder->where('start_date', '>=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function start_date_to($value)
    {
        return $this->builder->where('start_date', '<=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function expire_date_from($value)
    {
        return $this->builder->where('expire_date', '>=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function expire_date_to($value)
    {
        return $this->builder->where('expire_date', '<=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function sort($value)
    {
        $this->builder->getQuery()->orders = null;

        if (in_array($value, ['name', 'level', 'status', 'rate', 'start_date', 'expire_date', 'updated_at'])) {
            return $this->builder->orderBy($value, request()->get('dir'));
        } else if ($value == 'creator') {

            $withUser = $this->builder->join('page_user', 'pages.id', '=', 'page_user.page_id');
            $withUser = $withUser->join('users', 'page_user.user_id', '=', 'users.id');
            $withUser = $withUser->select(['pages.*', 'users.phone as phone']);

            return $withUser->orderBy('phone', request()->get('dir'));

        } else if ($value == 'work_category') {

            $withWorkCategory = $this->builder->join('work_items', 'pages.work_item_id', '=', 'work_items.id');
            $withWorkCategory = $withWorkCategory->join('work_categories', 'work_items.work_category_id', '=', 'work_categories.id');
            $withWorkCategory = $withWorkCategory->select(['pages.*', 'work_categories.name as work_category_name']);

            return $withWorkCategory->orderBy('work_category_name', request()->get('dir'));

        } else if ($value == 'work_item') {

            $withWorkItem = $this->builder->join('work_items', 'pages.work_item_id', '=', 'work_items.id');
            $withWorkItem = $withWorkItem->select(['pages.*', 'work_items.name as work_item_name']);

            return $withWorkItem->orderBy('work_item_name', request()->get('dir'));

        } else if ($value == 'province') {

            $withAddress = $this->builder->join('page_addresses', 'pages.id', '=', 'page_addresses.page_id');
            $withCity = $withAddress->join('cities', 'page_addresses.city_id', '=', 'cities.id');
            $withProvince = $withCity->join('provinces', 'cities.province_id', '=', 'provinces.id');
            $withProvince = $withProvince->select(['pages.*', 'provinces.name as province_name']);

            return $withProvince->orderBy('province_name', request()->get('dir'));

        } else if ($value == 'city') {

            $withAddress = $this->builder->join('page_addresses', 'pages.id', '=', 'page_addresses.page_id');
            $withCity = $withAddress->join('cities', 'page_addresses.city_id', '=', 'cities.id');

            $withCity = $withCity->select(['pages.*', 'cities.name as city_name']);

            return $withCity->orderBy('city_name', request()->get('dir'));

        }

        return $this->builder;
    }

    public function garbageStatus($value)
    {
        if (in_array($value, ['deleted', 'un-deleted'])) {
            return $this->builder->where('deleted_at', ($value == 'deleted' ? '!=' : '='), null);
        }

        return $this->builder;
    }


}
