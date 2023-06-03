<?php


namespace App\Services\V1;


use App\Models\Province;

class ProvinceService
{
    public function store($data)
    {
        return Province::create($data);
    }

    public function update(Province $province, $data)
    {
        return $province->update($data);
    }

}