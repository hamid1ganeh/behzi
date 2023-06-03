<?php


namespace App\Services\V1;


use App\Models\Admin;

class AdminService
{
    public function store($data)
    {

        $admin = Admin::create($data);

        $admin->syncRoles($data['roles']);

        return $admin;
    }

    public function update(Admin $admin, $data)
    {
        $admin->update($data);

        $admin->syncRoles($data['roles']);
    }
}