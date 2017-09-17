<?php

use Faker\Generator as Faker;

$factory->define(App\Operation::class, function (Faker $faker) {
    $value = $faker->numberBetween(0, 1000);
    $type = collect([
        \App\Operation::TYPE_RECEIPT,
        \App\Operation::TYPE_EXPENSE,
        \App\Operation::TYPE_INCOME
    ])->random();

    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'value' => $type !== \App\Operation::TYPE_INCOME ? $value * -1 : $value,
        'operation_date' => \Carbon\Carbon::now(),
        'type' => $type,
        'description' => $faker->text(50),
    ];
});
