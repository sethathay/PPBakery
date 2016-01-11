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
	return view('auth/login');
	//return view('/layout/index');
});

Route::post('login', function () {
	$user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
	);

	if (Auth::attempt($user)) {
		return Redirect::route('layout/index')
		->with('flash_notice', 'You are successfully logged in.');
	}

	// authentication failure! lets go back to the login page
	return Redirect::route('login')
	->with('flash_error', 'Your username/password combination was incorrect.')
	->withInput();
});

Route::get('users/index', ['as' => 'users.index', 'uses' => 'UsersController@index']);
Route::get('users/create', 'UsersController@create');
Route::get('users/show/{id}', 'UsersController@show');
Route::post('users/store', ['as' => 'users.store', 'uses' => 'UsersController@store']);
Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('users/update', ['as' => 'users.update', 'uses' => 'UsersController@update']);

Route::get('login', array('as' => 'login', function () { }));

//Route::resource('users', 'UsersController');