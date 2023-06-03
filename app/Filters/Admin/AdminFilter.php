<?php

namespace App\Filters\Admin;

use Kyslik\LaravelFilterable\Filter;

class AdminFilter extends Filter
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
            'email' => ['email'],
            'statuses' => ['statuses'],
            'created_at_from' => ['created_at_from'],
            'created_at_to' => ['created_at_to'],
            'updated_at_from' => ['updated_at_from'],
            'updated_at_to' => ['updated_at_to'],
            'sort' => ['sort'],
            'garbageStatus' => ['garbage_status']
        ];
    }

    public function name($value)
    {
        return $this->builder->where('name', 'LIKE', "%{$value}%");
    }


    public function email($value)
    {
        return $this->builder->where('email', 'LIKE', "%{$value}%");
    }

    public function statuses($value)
    {
        return $this->builder->whereIn('status', $value);
    }

    public function updated_at_from($value)
    {
        return $this->builder->where('updated_at', '>=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function updated_at_to($value)
    {
        return $this->builder->where('updated_at', '<=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function created_at_from($value)
    {
        return $this->builder->where('created_at', '>=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function created_at_to($value)
    {
        return $this->builder->where('created_at', '<=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function sort($value)
    {
        $this->builder->getQuery()->orders = null;

        if (in_array($value, ['name', 'email', 'status', 'created_at', 'updated_at'])) {
            return $this->builder->orderBy($value, request()->get('dir'));
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
