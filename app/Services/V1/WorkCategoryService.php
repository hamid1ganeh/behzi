<?php


namespace App\Services\V1;


use App\Models\WorkCategory;

class WorkCategoryService
{
    public function store($data)
    {
        return WorkCategory::create($data);
    }

    public function update(WorkCategory $workCategory, $data)
    {
        $workCategory->update($data);
    }
}