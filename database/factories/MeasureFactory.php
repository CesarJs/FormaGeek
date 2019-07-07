<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Treina\Models\Measure;
use Faker\Generator as Faker;

$factory->define(Measure::class, function (Faker $faker) {
    return [
        'neck' => $faker->randomFloat($nbMaxDecimals = 2, $min = 56, $max = 90),
        'arm' => $faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 50),
        'chest' => $faker->randomFloat($nbMaxDecimals = 2, $min = 70, $max = 160),
        'waist' => $faker->randomFloat($nbMaxDecimals = 2, $min = 40, $max = 160),
        'abdomen' => $faker->randomFloat($nbMaxDecimals = 2, $min = 40, $max = 160),
        'weight' => $faker->randomFloat($nbMaxDecimals = 2, $min = 60, $max = 110),
        'height' => rand(70,150),
        'user_id' => function () {
            return factory(Treina\User::class)->create()->id;
        }
    ];
});
