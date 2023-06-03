<?php

namespace App\Filters\Admin;

use Illuminate\Database\Eloquent\Builder;
use Kyslik\LaravelFilterable\Filter;
use Morilog\Jalali\Jalalian;

class PageGalleryImageFilter extends Filter
{
    /**
     * Available Filters and their aliases.
     *
     * @return array ex: ['method-name', 'another-method' => 'alias', 'yet-another-method' => ['alias-one', 'alias-two]]
     */
    function filterMap(): array
    {
        return [
            'title' => ['title'],
            'alt' => ['alt'],
            'galleries' => ['galleries'],
            'statuses' => ['statuses'],
            'created_at_from' => ['created_at_from'],
            'created_at_to' => ['created_at_to'],
            'updated_at_from' => ['updated_at_from'],
            'updated_at_to' => ['updated_at_to'],
            'sort' => ['sort'],
            'garbageStatus' => ['garbage_status']
        ];
    }

    public function title($value)
    {
        return $this->builder->whereHas('image', function (Builder $query) use ($value) {
            return $query->where('title', 'like', "%{$value}%");
        });
    }

    public function alt($value)
    {
        return $this->builder->whereHas('image', function (Builder $query) use ($value) {
            return $query->where('alt', 'like', "%{$value}%");
        });
    }

    public function statuses($value)
    {
        return $this->builder->whereIn('status', $value);
    }

    public function galleries($value)
    {
        return $this->builder->whereIn('page_gallery_id', $value);
    }

    public function created_at_from($value)
    {
        return $this->builder->where('created_at', '>=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function created_at_to($value)
    {
        return $this->builder->where('created_at', '<=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function updated_at_from($value)
    {
        return $this->builder->where('updated_at', '>=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function updated_at_to($value)
    {
        return $this->builder->where('updated_at', '<=', Jalalian::fromFormat('Y-m-d', $value)->toCarbon());
    }

    public function sort($value)
    {

        $this->builder->getQuery()->orders = null;

        if (in_array($value, ['created_at', 'updated_at'])) {
            return $this->builder->orderBy($value, request('dir'));
        } else if ($value == 'gallery') {
            $res = $this->builder->join('page_galleries', 'page_gallery_images.page_gallery_id', '=', 'page_galleries.id');
            $res = $res->orderBy('page_galleries.name', request()->get('dir'));
            $res = $res->select(['page_gallery_images.*']);
            return $res;
        } else if (in_array($value, ['status', 'title', 'alt'])) {
            $res = $this->builder->join('images', 'page_gallery_images.id', '=', 'images.imageable_id');
            $res = $res->where('images.imageable_type', 'App\Models\PageGalleryImage');
            $res = $res->select('page_gallery_images.*');
            $res = $res->orderBy($value, request()->get('dir'));
            return $res;
        } else {
            return $this->builder;
        }
    }

    public function garbageStatus($value)
    {
        if (in_array($value, ['deleted', 'un-deleted'])) {
            return $this->builder->where('deleted_at', ($value == 'deleted' ? '!=' : '='), null);
        }

        return $this->builder;
    }
}
