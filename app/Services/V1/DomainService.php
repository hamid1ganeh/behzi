<?php


namespace App\Services\V1;


use App\Models\Domain;
use App\Services\V1\Interfaces\ICrudService;
use http\Env\Request;

class DomainService
{
    public function read()
    {
        return Domain::all();
    }
    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function create(Request $request)
    {
        // TODO: Implement create() method.
    }
}