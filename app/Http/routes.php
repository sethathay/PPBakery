<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return view('/layout/index');
});

Route::get('users/index', 'UsersController@index');
Route::get('users/create', 'UsersController@create');
Route::get('users/store', 'UsersController@store');

Route::get('products/index', 'ProductsController@index');
Route::get('products/create', 'ProductsController@create');