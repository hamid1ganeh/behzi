<?php

namespace App\Filters\User;

use Kyslik\LaravelFilterable\Generic\Filter;

class TicketFilter extends Filter
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
            'title' => ['title'],
        ];
    }

    public function title($value)
    {
        return $this->builder->where('title', 'like', "%{$value}%");
    }



}
