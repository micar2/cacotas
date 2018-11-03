<?php

use Faker\Generator as Faker;

$factory->define(App\OrdersArticles::class, function (Faker $faker) {
    return [
        'articleId' =>  $faker->numberBetween($min=0,$max=200),
        'orderId' =>  $faker->numberBetween($min=0,$max=1000),
        'number' =>  $faker->numberBetween($min=0,$max=100),
        'prepare' => true,
    ];
});
