<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Illuminate\Support\Str;
use Treina\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'description' => $faker->randomFloat($nbMaxDecimals = 1, $min = 56, $max = 90),
        'user_id' => function () {
            return factory(Treina\User::class)->create()->id;
        }
    ];
});
