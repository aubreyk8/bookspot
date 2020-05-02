<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\Reviews;
use Faker\Generator as Faker;

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

$factory->define(Reviews::class, function (Faker $faker) {
    return [
        'book_id' => $faker->numberBetween(1, 5),
        'review' => $faker->numberBetween(1, 5),
        'comment' => $faker->text,
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
