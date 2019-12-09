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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        //'user_type' => 'pacjent'
    ];
});

$factory->define(App\Patient::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'imie' => $faker->name,
		'nazwisko' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
		'pesel' => $faker->numberBetween(100000000000,99999999999),
		'adres' => $faker->address,
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});
