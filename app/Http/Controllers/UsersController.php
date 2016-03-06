<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use App\User;
use Input;

class UsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{
		$users = User::where('is_active', 1)->get();
		return view('users/index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		$countries = array_merge(array(''=>'Please Select'), DB::table('countries')->lists('name', 'id'));
		return view('users/create', compact('countries'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(User $user, Request $request)
	{
		/*
		 * $user = Input::all();
		* or
		*/
		$users = $request->all();
		$users['password']	= Hash::make($request->get('password'));
		$users['created_by']	= 1;
		$user->fill($users)->save();
		return Redirect::route('users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
		$user = User::whereId($id)->first();
		$countries = array_merge(array(''=>'Please Select'), DB::table('countries')->lists('name', 'id'));
		return view('users/show', compact('countries', 'user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$user = User::find($id);//whereId($id)->first();
		$countries = array_merge(array(''=>'Please Select'), DB::table('countries')->lists('name', 'id'));
		return view('users/edit', compact('countries', 'user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(User $users, Request $request)
	{
		$user = $request->all();
		if ( $request->get('password') != null ){
			$user['password']	= Hash::make($request->get('password'));
		}else{
			unset($user['password']);
		}
		unset($user['_token']);
		unset($user['photo']);
		unset($user['retype_password']);
		$users->whereId(Input::get('id'))->update($user);
		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
		$user = new User;
		$user->where('id', $id)->update(['is_active' => 0]);
		return Redirect::route('users.index')->with('flash_notice', 'You are successfully delete!');
	}



	public function doLogin(Request $request) {
		// Applying validation rules.
		$userdata = array(
		    'username' => Input::get('username'),
		    'password' => Input::get('password')
		);
		// doing login.
		if (Auth::validate($userdata)) {
			if (Auth::attempt($userdata)) {
				$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
				$request->session()->put('exchangerate', $exchangerate);
				return Redirect::intended('/dashboard');
			}
		}
		else {
			// if any error send back with message.
			Session::flash('flash_error', 'Invalid username or password!!');
			return Redirect::to('/');
		}
	}
	
	public function logout() {
		Auth::logout();
		return Redirect::intended('/');
	}
	
	
}
