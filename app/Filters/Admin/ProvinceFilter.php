<?php

namespace App\Filters\Admin;

use Kyslik\LaravelFilterable\Filter;
use Morilog\Jalali\Jalalian;

class ProvinceFilter extends Filter
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
            'statuses' => ['statuses'],
            'sort' => ['sort'],
        ];
    }

    public function name($value)
    {
        return $this->builder->where('name', 'LIKE', "%{$value}%");
    }

    public function statuses($value)
    {
        return $this->builder->whereIn('status', $value);
    }

    public function sort($value)
    {
        $this->builder->getQuery()->orders = null;

        if (in_array($value, ['name', 'status'])) {
            return $this->builder->orderBy($value, request()->get('dir'));
        }

        return $this->builder;
    }

}
