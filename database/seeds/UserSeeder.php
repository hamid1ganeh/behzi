<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            \App\Models\User::create([
                'name' => $faker->name,
                'code' => \Illuminate\Support\Str::random(7),
                'verifyCode' => 11111,
                'email' => $faker->email,
                'mobile' => rand(11111111111, 99999999999),
                'codeExpireTime' => now()->addYear(),
                'status' => \App\Enums\UserStatus::Active
            ]);
        }
    }
}
