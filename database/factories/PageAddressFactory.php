<?php

/** @var Factory $factory */

use App\Enums\PageAddressStatus;
use App\Models\City;
use App\Models\Page;
use App\Models\PageAddress;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(PageAddress::class, function (Faker $faker) {
    return [
        'city_id' => City::all()->random()->id,
        'address' => $faker->address,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'status' => PageAddressStatus::Approved
    ];
});
