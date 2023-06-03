<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Support Role
        $supportRole = Role::create([
            'name' => 'Support',
            'guard_name' => 'admin'
        ]);

        $supportRole->givePermissionTo([
            'ticket.index',
            'ticket.show',
            'ticket.create',
            'ticket.store',
            'ticket.edit',
            'ticket.update',
            'ticket.destroy',
            'ticket.recycle',
            'ticket_department.index',
            'ticket_department.show',
            'ticket_department.create',
            'ticket_department.store',
            'ticket_department.edit',
            'ticket_department.update',
            'ticket_department.destroy',
            'ticket_department.recycle',
        ]);

        // Operator Role
        $operatorRole = Role::create([
            'name' => 'Operator',
            'guard_name' => 'admin'
        ]);

        $operatorRole->givePermissionTo([
            'province.index',
            'province.show',
            'province.create',
            'province.store',
            'province.edit',
            'province.update',
            'province.destroy',
            'province.recycle',
            'city.index',
            'city.show',
            'city.create',
            'city.store',
            'city.edit',
            'city.update',
            'city.destroy',
            'city.recycle',
            'work_category.index',
            'work_category.show',
            'work_category.create',
            'work_category.store',
            'work_category.edit',
            'work_category.update',
            'work_category.destroy',
            'work_category.recycle',
            'work_item.index',
            'work_item.show',
            'work_item.create',
            'work_item.store',
            'work_item.edit',
            'work_item.update',
            'work_item.destroy',
            'work_item.recycle',
        ]);

        // Operator2 Role
        $operator2Role = Role::create([
            'name' => 'Operator2',
            'guard_name' => 'admin'
        ]);

        $operator2Role->givePermissionTo([
            'page.index',
            'page.show',
            'page.create',
            'page.store',
            'page.edit',
            'page.update',
            'page.destroy',
            'page.recycle',
            'gallery.index',
            'gallery.show',
            'gallery.create',
            'gallery.store',
            'gallery.edit',
            'gallery.update',
            'gallery.destroy',
            'gallery.recycle',
            'gallery_image.index',
            'gallery_image.show',
            'gallery_image.create',
            'gallery_image.store',
            'gallery_image.edit',
            'gallery_image.update',
            'gallery_image.destroy',
            'gallery_image.recycle',
        ]);

        // Supper Admin Role
        $superAdminRole = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'admin'
        ]);

    }
}
