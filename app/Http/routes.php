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


Route::get('/', array('as' => 'login', function () {
	return View::make('/layout/index');
}));
Route::get('/dashboard', array('as' => 'dashboard', function () {
	return View::make('/layout/dashboard');
}));
Route::get('users/index', ['as' => 'users.index', 'uses' => 'UsersController@index']);
Route::get('users/create', 'UsersController@create');
Route::get('users/show/{id}', 'UsersController@show');
Route::post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store']);
Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('users/update', ['as' => 'users.update', 'uses' => 'UsersController@update']);

Route::post('users/doLogin', ['as' => 'users.doLogin', 'uses' => 'UsersController@doLogin']);
Route::get('users/login', array('as' => 'users.login', function () { }));

//Route::resource('users', 'UsersController');