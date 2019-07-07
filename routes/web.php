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
	$user->hip = $user->measure->last()->hip;

	$user->imc = ($user->measure->last()->weight) / (($user->measure->last()->height*$user->measure->last()->height)/ 10000);

	$user->bf = 86.010*log($user->abdomen - $user->neck) - 70.041 * log($user->weight);

	/*$user->bf_feminino =163.205 * log($user->waist + $user->hip - $user->neck);  (97.684 * log($user->weight) -78.387);*/
	$user->bf_feminino =163.203*log(45)-97.684*log(65) -87.387;



	dd($user->bf_feminino);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
