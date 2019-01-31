<?php

use Faker\Generator as Faker;

$factory->define(App\Habit::class, function (Faker $faker) {
    return [
        'name' => array_random(['sleep', 'sex', 'clubbing', 'sports']),
    ];
});
