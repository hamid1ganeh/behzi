<?php

/** @var Factory $factory */

use App\Models\Page;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Page::class, function (Faker $faker) {

    return [
        'work_item_id' => \App\Models\WorkItem::all()->random()->id,
        'code' => \Illuminate\Support\Str::random(10),
        'name' => $faker->words(2, true),
        'description' => $faker->paragraph,
        'level' => \App\Enums\PageLevel::Simple,
        'status' => rand(1, 4),
        'start_date' => now(),
        'expire_date' => now()->addYears(rand(1, 3))
    ];
});
