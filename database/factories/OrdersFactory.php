<?php

use Faker\Generator as Faker;

$factory->define(App\Orders::class, function (Faker $faker) {
    return [
        'companyId' =>  $faker->numberBetween($min=0,$max=200),
        'deliverDate' => $faker->date(),
        'open' => false,
    ];
});
