<?php

use Treina\Models\Metabolism;
use Illuminate\Database\Seeder;

class MetabolismTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$metabolist=[];
    	$metabolist[]=['multiply'=>1.200,'description'=>'Pouco exercício'];
    	$metabolist[]=['multiply'=>1.375,'description'=>'Exercício Leve'];
    	$metabolist[]=['multiply'=>1.550,'description'=>'Exercício moderado'];
    	$metabolist[]=['multiply'=>1.725,'description'=>'Exercício pesado'];
    	$metabolist[]=['multiply'=>1.900,'description'=>'Exercício pesado diário'];

    	foreach ($metabolist as $value) {
    		Metabolism::create($value);
    		
    	}
    }
}
