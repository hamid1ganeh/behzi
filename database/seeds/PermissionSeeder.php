<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Page Permissions
        Permission::create([
            'name' => 'page.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'page.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'page.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'page.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'page.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'page.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'page.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'page.recycle',
            'guard_name' => 'admin'
        ]);

        // Gallery Permissions
        Permission::create([
            'name' => 'gallery.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery.recycle',
            'guard_name' => 'admin'
        ]);

        // Gallery Image Permissions
        Permission::create([
            'name' => 'gallery_image.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery_image.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery_image.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery_image.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery_image.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery_image.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery_image.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'gallery_image.recycle',
            'guard_name' => 'admin'
        ]);


        // Province Permissions
        Permission::create([
            'name' => 'province.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'province.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'province.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'province.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'province.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'province.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'province.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'province.recycle',
            'guard_name' => 'admin'
        ]);

        // City Permissions
        Permission::create([
            'name' => 'city.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'city.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'city.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'city.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'city.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'city.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'city.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'city.recycle',
            'guard_name' => 'admin'
        ]);

        // Work Category Permissions
        Permission::create([
            'name' => 'work_category.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_category.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_category.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_category.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_category.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_category.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_category.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_category.recycle',
            'guard_name' => 'admin'
        ]);

        // Work Item Permissions
        Permission::create([
            'name' => 'work_item.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_item.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_item.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_item.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_item.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_item.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_item.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'work_item.recycle',
            'guard_name' => 'admin'
        ]);

        // Ticket Permissions
        Permission::create([
            'name' => 'ticket.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket.recycle',
            'guard_name' => 'admin'
        ]);

        // Ticket Department Permissions
        Permission::create([
            'name' => 'ticket_department.index',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket_department.show',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket_department.create',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket_department.store',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket_department.edit',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket_department.update',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket_department.destroy',
            'guard_name' => 'admin'
        ]);
        Permission::create([
            'name' => 'ticket_department.recycle',
            'guard_name' => 'admin'
        ]);

    }
}
