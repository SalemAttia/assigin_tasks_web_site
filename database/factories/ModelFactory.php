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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'position' => $faker->name,
        'avatar' => $faker->name,
        'slug' => $faker->name,
        'rol' => $faker->numberBetween($min = 0, $max = 2)
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    
    $firstletter = "uploads/";
    $nseton  = $faker->numberBetween($min = 10, $max = 99);
    $fileattch = strtoupper($firstletter) . $nseton . '.'.'.zip';

    return [
        'taskname' => $faker->name,
        'assignedto' =>  $faker->numberBetween($min = 1, $max = 10),
        'description' =>  $faker->name,
        'statue' =>  $faker->name,
        'deadline' =>  $faker->date,
        'attachfile' =>  $fileattch,
    ];

});
