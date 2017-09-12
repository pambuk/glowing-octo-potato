<?php

use Faker\Generator as Faker;

$factory->define(App\OperationSource::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
    ];
});
