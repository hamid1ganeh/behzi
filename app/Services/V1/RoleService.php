<?php


namespace App\Services\V1;


use App\Enums\PageGalleryStatus;
use App\Models\PageGallery;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function store($data)
    {
        $role = Role::create([
            'name' => $data['name'],
            'guard_name' => 'admin'
        ]);

        $role->syncPermissions($data['permissions']);

        return $role;
    }

    public function update(Role $role, $data)
    {
        $role->update(['name' => $data['name']]);

        $role->syncPermissions($data['permissions']);
    }
}