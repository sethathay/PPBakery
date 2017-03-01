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
use App\UserGroup;
use App\UserLocation;
use App\UserSaleLog;
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
		$users = json_encode(User::where('is_active', 1)->get());
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
		$groups = DB::table('groups')->lists('name', 'id');
		$countries = DB::table('countries')->lists('name', 'id');
		return view('users/create', compact('countries', 'groups'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(User $user, Request $request, UserGroup $user_groups, UserLocation $user_locations)
	{
		/*
		* $user = Input::all();
		* or
		*/
		$users = $request->all();
		$users['password']	= Hash::make($request->get('password'));
		$users['created_by']	= 1;
		$user->fill($users)->save();
		$userId = $user->id;
		
		$location = array();
		$location['user_id'] = $userId;
		$location['location_id'] = Session::get('location_id');
		$user_locations->fill($location)->save();
		
		$group = array();
		$group['user_id'] = $userId;
		$group['group_id'] = $request->get('group_id');
		$user_groups->fill($group)->save();
		
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
		$countries = DB::table('countries')->lists('name', 'id');
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
		$groups = DB::table('groups')->lists('name', 'id');
		$user = User::select('users.*','user_groups.*')->leftJoin('user_groups','user_id','=', 'users.id')->where('users.id',$id)->first();//whereId($id)->first();
		
		$countries = DB::table('countries')->lists('name', 'id');
		return view('users/edit', compact('countries', 'user', 'groups'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(User $users, Request $request, UserGroup $user_groups, UserLocation $user_locations)
	{
		
		$user = array();
		$user = $request->all();
		if ( $request->get('password') != null ){
			$user['password']	= Hash::make($request->get('password'));
		}else{
			unset($user['password']);
		}
		unset($user['_token']);
        unset($user['_method']);
		unset($user['photo']);
		unset($user['dob']);
		unset($user['group_id']);
		unset($user['retype_password']);
		$users->where('id','=',$request->get('id'))->update($user);
		
		$locations = array();
		$locations['location_id'] = Session::get('location_id');
		$userId = $user['id'];
		$user_locations->where('user_id',$userId)->update($locations);
		
		$group = array();
		$group['group_id'] = $request->get('group_id');
		//$userId = $request->get('user_id');
		$user_groups->where('user_id',$userId)->update($group);
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
		    'password' => Input::get('password'),
			'is_active' => 1
		);
		// doing login.
		if (Auth::validate($userdata)) {
			if (Auth::attempt($userdata)) {
				
				$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
				$request->session()->put('exchangerate', $exchangerate);
				
				$getUserLocation = DB::table('user_locations')->join('locations', 'locations.id', '=', 'location_id')->where('user_id', Auth::user()->id)->first();
				$userGroup = DB::table('user_groups')->where('user_id',Auth::user()->id)->first();
				
				$request->session()->put('location_id', $getUserLocation->location_id);
				$request->session()->put('location_name', $getUserLocation->name);
				$request->session()->put('group_id', $userGroup->group_id);
				
				// Add to user sale log
				$userSaleLog 				= new UserSaleLog();
				$userSaleLog->user_id		= Auth::user()->id;
				$userSaleLog->dates			= date('Y-m-d');
				$userSaleLog->time_in		= date('H:i:s');
				$userSaleLog->save();
				$request->session()->put('userSaleLog_id', $userSaleLog->id);
				
				
				$direction = '/dashboard';
//				if($userGroup->group_id != 1){
//					$direction = '/saleOrders/index';
//				}
				return Redirect::intended($direction);
			}
		}
		else {
			// if any error send back with message.
			Session::flash('flash_error', 'Invalid username or password!!');
			return Redirect::to('/');
		}
	}
	
	public function logout() {	
		// Add to user sale log
		$userSaleLog 				= UserSaleLog::find(Session::get('userSaleLog_id'));
		$userSaleLog->auto_time_out	= date('H:i:s');
		$userSaleLog->save();
		
		Auth::logout();
		return Redirect::intended('/');
	}
	
	
}
