<?php

use Faker\Generator as Faker;

$factory->define(App\Orders::class, function (Faker $faker) {
    return [
        'companyId' =>  $faker->numberBetween($min=0,$max=200),
        'userId' =>  $faker->numberBetween($min=0,$max=1000),
        'deliverDate' => $faker->date(),
        'open' => false,
    ];
});
