<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Visitor;
use Faker\Generator as Faker;

$factory->define(Visitor::class, function (Faker $faker) {

    return [
        'ip' => $faker->ipv4,
        'continent' => $faker->word,
        'continent_code' => $faker->randomLetter . $faker->randomLetter . $faker->randomLetter,
        'country' => $faker->country,
        'country_code' => $faker->countryCode,
        'region_name' => $faker->state,
        'region' => $faker->randomLetter . $faker->randomLetter . $faker->randomLetter,
        'lat' => $faker->latitude,
        'lon' => $faker->longitude,
        'mobile' => boolval($faker->numberBetween(0, 1)),
        'proxy' => boolval($faker->numberBetween(0, 1)),
        'book_id' => $faker->numberBetween(1, 5),
    ];
});
