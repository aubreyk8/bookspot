<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    $prices = [
        60,
        80,
        120,
        180,
    ];

    return [
        'book_id' => $faker->numberBetween(1, 5),
        'user_id' => $faker->numberBetween(2, 3),
        'order_id' => $faker->numberBetween(2, 3),
        'price' => $prices[$faker->numberBetween(0, 3)],
        'link' => $faker->url,
        'downloads' => $faker->numberBetween(1, 10),
        'expires_on' => Carbon::now()->addDays($faker->numberBetween(0, 10)),
        'created_at' => Carbon::now()
            ->subDays($faker->numberBetween(0, 365))
            ->subHours($faker->numberBetween(1, 23))
            ->subMinutes($faker->numberBetween(0, 59))
            ->subSeconds($faker->numberBetween(0, 59)),
        'updated_at' => Carbon::now()
            ->subDays($faker->numberBetween(0, 365))
            ->subHours($faker->numberBetween(1, 23))
            ->subMinutes($faker->numberBetween(0, 59))
            ->subSeconds($faker->numberBetween(0, 59)),
    ];
});
