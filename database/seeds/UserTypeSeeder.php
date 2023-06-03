<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserType::insert([
           [
               'name'   =>  'Owner',
               'status' =>  1,
           ] ,
           [
               'name'   =>  'Member',
               'status' =>  1,
           ] ,
        ]);
    }
}
