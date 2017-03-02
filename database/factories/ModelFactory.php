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
    
    $groups = array(
            'Administrators',
            'Users',
            'Guests'
            );
    $group_key = array_rand($groups);
    return [
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'permission_level' => $groups[$group_key],
        'account_status' => 'Disabled',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(gotham\Project::class, function (Faker\Generator $faker) {
    
    
    return [
        'name' => $faker->realText(20),
        'description' => $faker->realText(60),
        
    ];
});

$factory->define(gotham\RFI::class, function (Faker\Generator $faker) {
    

    return [
        'subject' => $faker->realText(10),
        'body' => $faker->paragraphs($nb = 10, $asText = true),
        'to' => rand(1,10),
        'user_id' => 1,
        'project_id' => rand(1,10),
        'status' => 'Submitted',
        'control_number' => rand(1,10000),
        'last_updated_by' => rand(1,10),
    ];
});

$factory->define(gotham\RFIPost::class, function (Faker\Generator $faker) {
    

    return [
        'message' => $faker->realText(120),
        'user_id' => rand(1,2),
        'rfi_id' => rand(1,100),
    ];
});

$factory->define(gotham\Project_User::class, function (Faker\Generator $faker) {


    return [
        'user_id' => 1,
        'project_id' => rand(1,10),
    ];
});

$factory->define(gotham\Group::class, function (Faker\Generator $faker) {


    return [
        'name' => $faker->realText(10),

    ];
});