<?php

use Faker\Generator as Faker;

$factory->define(App\Management::class, function (Faker $faker) {
    return [
        'userId' =>  $faker->numberBetween($min=1,$max=100),
        'orderId' =>  $faker->numberBetween($min=1,$max=100),
        'situation' => $faker->title($gender = 'preparacion'|'enviado'|'entregado'|'preparado'|'cancelado'|'aceptado'),

    ];
});
