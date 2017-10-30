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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->state(\App\Models\User::class,'admin', function (Faker\Generator $faker){

    return [
        'role' => \App\Models\User::ROLE_ADMIN
    ];

});

$factory->state(\App\Models\User::class, 'manager', function (Faker\Generator $faker) {
    return [
        'role' =>  \App\Models\User::ROLE_MANAGER,
    ];
});

$factory->define(App\Models\RouteAccess::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'route_user' => $faker->name,
        'route_password' => $password ?: $password = bcrypt('secret'),
        'ppoe_user' => $faker->name,
        'ppoe_password' => $password ?: $password = bcrypt('secret'),
        'wifi_user' => $faker->name,
        'wifi_password' => $password ?: $password = bcrypt('secret'),
    ];
});
