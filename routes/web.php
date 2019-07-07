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
	$user->wight =  $user->measure->last()->weight;
	$user->height = $user->measure->last()->height;
	
	$user->imc = ($user->measure->last()->weight) / (($user->measure->last()->height*$user->measure->last()->height)/ 10000);


	
	dd($user->imc);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
