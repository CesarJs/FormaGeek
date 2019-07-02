<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(Measure::class, function (Faker $faker) {
    return [
        'neck' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 56, $max = 90),
        'arm' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 20, $max = 50),
        'chest' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 70, $max = 160),
        'waist' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 40, $max = 160),
        'abdomen' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 40, $max = 160),
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 40, $max = 160),
        'height' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 40, $max = 210),
        'user_id' => function () {
            return factory(Treina\User::class)->create()->id;
        }
    ];
});
