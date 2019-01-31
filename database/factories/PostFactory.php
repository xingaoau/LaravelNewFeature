<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'user_id' => User::all()->random()->id
    ];
});
