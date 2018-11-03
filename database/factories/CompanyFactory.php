<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'userId' =>  $faker->numberBetween($min=0,$max=100),
        'name' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'telephone' => $faker->randomNumber($nbDigits = 9, $strict = false),
        'debt' => $faker->numberBetween($min=0,$max=10000),
        'schedule' => $faker->time($format = 'H:i:s'),
    ];
});
