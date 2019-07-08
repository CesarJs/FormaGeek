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
	$user = Auth::loginUsingId(2, true);
	$user->weight =  $user->measure->last()->weight;
	$user->height = $user->measure->last()->height;
	$user->neck = $user->measure->last()->neck;
	$user->abdomen = $user->measure->last()->abdomen;
	$user->waist = $user->measure->last()->waist;
	$user->hip = $user->measure->last()->hip;

	$user->imc = ($user->measure->last()->weight) / (($user->measure->last()->height*$user->measure->last()->height)/ 10000);
	$user->bf = 495/(1.0324-0.19077*(LOG10($user->measure->last()->abdomen-$user->measure->last()->neck))+0.15456*(LOG10($user->measure->last()->height)))-450;
	$user->bf_feminino =495/(1.29579-0.35004*(LOG10($user->measure->last()->abdomen+$user->measure->last()->waist-$user->measure->last()->neck))+0.221*(LOG10($user->measure->last()->height)))-450;



	dd($user->bf_feminino);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
