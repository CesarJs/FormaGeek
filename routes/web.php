<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


	$user = Auth::loginUsingId(1, true);

	$user->weight =  $user->measure->last()->weight;
	$user->height = $user->measure->last()->height;
	$user->neck = $user->measure->last()->neck;
	$user->abdomen = $user->measure->last()->abdomen;
	$user->waist = $user->measure->last()->waist;




	$user->imc = ($user->measure->last()->weight) / (($user->measure->last()->height*$user->measure->last()->height)/ 10000);
	$user->bf = 495/(1.0324-0.19077*(LOG10($user->measure->last()->abdomen-$user->measure->last()->neck))+0.15456*(LOG10($user->measure->last()->height)))-450;
	$user->bf_feminino =495/(1.29579-0.35004*(LOG10($user->measure->last()->abdomen+$user->measure->last()->waist-$user->measure->last()->neck))+0.221*(LOG10($user->measure->last()->height)))-450;

	/** Calculo Basal 
			 manter o peso = metabolismo * metabolism->muliply
			 perder peso   = metabolismo * metabolism->muliply - 16%
			 ganhar peso   = metabolismo * metabolism->muliply + 16%

	***/
	
	$user->metabolist=66 + (13.7 * $user->measure->last()->weight) + (5 * $user->measure->last()->height) - (6.8 * $user->age);

	$user->metabolist_female=665 + (9.6 * $user->measure->last()->weight) + (1.8 * $user->measure->last()->height) - (4.7 * $user->age);


	/* Calculo de macronutrientes de aconto com calorias basal
	    10 a 35% de proteína    = basal_escolhido*0.65~~0.90/4
    	45 a 65% de carboidrato = basal_escolhido*0.35~~0.55/4
    	20 a 35% de gordura     = vasal_escolhido*0.65~~0.80/9
    */



	dd($user);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('diets', DietsController::class);
Route::resource('measures', MeasuresController::class);
Route::resource('foods', FoodsController::class);
/*
Route::name('measures.')->group(function () {
    Route::get('index', 'MeasuresController@index')->name('index');
});
*/