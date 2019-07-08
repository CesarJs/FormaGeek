<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Treina\Models\Metabolism;
use Faker\Generator as Faker;



	$factory->define(Metabolism::class, function (Faker $faker) {
		return [
			'multiply'=>1,'description'=>'teste'
		];
	});
	


