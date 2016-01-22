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
	if ( Auth::check() ) // use Auth::check instead of Auth::user
	{
		return View::make('/layout/dashboard')->with('flash_notice', 'You are already logged in!');;
	} else{
		return View::make('/layout/index');
	}
});

Route::get('/dashboard', array('as' => 'dashboard', function () {
	return View::make('/layout/dashboard');
}));

Route::get('/pos', array('as' => 'pos', function () {
	return View::make('/layout/pos');
}));

Route::get('users/index', ['as' => 'users.index', 'uses' => 'UsersController@index']);
Route::get('users/create', 'UsersController@create');
Route::get('users/show/{id}', 'UsersController@show');
Route::post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store']);
Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('users/update', ['as' => 'users.update', 'uses' => 'UsersController@update']);
Route::get('users/destroy/{id}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);

Route::post('users/doLogin', ['as' => 'users.doLogin', 'uses' => 'UsersController@doLogin']);
Route::get('users/login', array('as' => 'users.login', function () { }));
Route::get('users/logout', 'UsersController@logout');

//Route::resource('users', 'UsersController');

// Route of products by Thay Setha
Route::post('products/searchProdctByCode', ['as' => 'products.searchProdctByCode', 'uses' => 'ProductsController@searchProdctByCode']);
Route::get('products/index', 'ProductsController@index');
Route::get('products/create', 'ProductsController@create');
Route::get('products/store', 'ProductsController@store');

//=========================================================