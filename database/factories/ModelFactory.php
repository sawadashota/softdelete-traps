<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->country,
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'country_id' => 1,
        'email'      => $faker->safeEmail,
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'body'  => $faker->text($maxNbChars = 200),
    ];
});
