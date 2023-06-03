<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinceCitySeeder::class);
        $this->call(WeekDaySeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserTypeSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        if(app()->environment() === 'development')
        {
            $this->call(AdminSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(PageSeeder::class);
        }
    }
}
