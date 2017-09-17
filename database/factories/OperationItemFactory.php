<?php

use Faker\Generator as Faker;

$factory->define(App\OperationItem::class, function (Faker $faker) {
    return [
        'description' => $faker->text(50),
        'value' => $faker->numberBetween(100, 10000),
        'quantity' => $faker->numberBetween(1, 3),
    ];
});
