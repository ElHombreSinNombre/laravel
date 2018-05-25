<?php

use Faker\Generator as Faker;



$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'user_name' => $faker->name,
        'password' => bcrypt('password'),
        'created_at' => Carbon::now(),
        'remember_token' => str_random(10),
    ];
});
