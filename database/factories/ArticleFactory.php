<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'reference' => $faker->numberBetween($min = 1000, $max = 9000),
        'price' => $faker->numberBetween($min = 1, $max = 50),
        'stock' => $faker->numberBetween($min = 0, $max = 100000),
        'description' => $faker->text($maxNbChars = 200),
    ];
});
