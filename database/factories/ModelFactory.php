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
$factory->define(gotham\User::class, function (Faker\Generator $faker) {
    static $password;
    
    $permissions = array( 
            'Administrator',
            'User',
            'Guest'
            );
    $permissions_key = array_rand($permissions);
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'permission_level' => $permissions[$permissions_key],
        'account_status' => 'Disabled',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(gotham\Project::class, function (Faker\Generator $faker) {


    return [
        'name' => $faker->text,
    ];
});