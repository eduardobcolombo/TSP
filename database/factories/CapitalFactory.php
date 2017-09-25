<?php

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

$factory->define(App\Capital::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'latitude' => 40.0000,
        'longitude' => 40.0000,
    ];
});
