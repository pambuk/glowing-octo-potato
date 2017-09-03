<?php

use Faker\Generator as Faker;

$factory->define(App\Operation::class, function (Faker $faker) {
    $amount = $faker->numberBetween(0, 1000);
    $type = collect([
        \App\Operation::TYPE_RECEIPT,
        \App\Operation::TYPE_EXPENSE,
        \App\Operation::TYPE_INCOME
    ])->random();

    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'amount' => $type !== \App\Operation::TYPE_INCOME ? $amount * -1 : $amount,
        'operation_date' => \Carbon\Carbon::now(),
        'type' => $type,
        'description' => $faker->text(50),
    ];
});
