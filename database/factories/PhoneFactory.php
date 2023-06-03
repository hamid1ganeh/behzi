<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Phone;
use Faker\Generator as Faker;

$factory->define(Phone::class, function (Faker $faker) {
    return [
        'page_id' => \App\Models\Page::all()->random()->getId(),
        'name' => $faker->word,
        'number' => rand(981111111111, 989999999999),
        'status' => rand(1, 3),
        'priority' => 0,
    ];
});
