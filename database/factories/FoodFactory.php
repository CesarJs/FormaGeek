<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Illuminate\Support\Str;
use Treina\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name' => Str::random(15),
        'calories' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2500),
        'proteins' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
        'carbo' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
        'fiber' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
        'sodium' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
        'potassium' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
        'cholesterol' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
        'fat' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
        'status' => 1,
        'user_id' => function () {
            return factory(Treina\User::class)->create()->id;
        }
    ];
});
