<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\UserSaleLog;
use Input;
use DB;
use View;

class UserSaleLogsController extends Controller
{
    
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$input = $request->all();
		
		if(isset($input['dates']) && $input['dates'] !=  ""){
			$userSaleLogs = UserSaleLog::select('user_sale_logs.id','first_name','total_kh', 'total_us', 'dates', DB::raw("SUBSTRING(time_in,1,5) AS time_in"), DB::raw("SUBSTRING(time_out,1,5) AS time_out"), DB::raw("SUBSTRING(auto_time_out,1,5) AS auto_time_out"))->join('users', 'users.id','=','user_id')->where('dates', $input['dates'])->where('user_id',Auth::user()->id)->get();
		}else{
			$userSaleLogs = UserSaleLog::select('user_sale_logs.id','first_name','total_kh', 'total_us', 'dates', DB::raw("SUBSTRING(time_in,1,5) AS time_in"), DB::raw("SUBSTRING(time_out,1,5) AS time_out"), DB::raw("SUBSTRING(auto_time_out,1,5) AS auto_time_out"))->join('users', 'users.id','=','user_id')->where('dates', date('Y-m-d'))->where('user_id',Auth::user()->id)->get();
		}
        
        $userSaleLogs = json_encode($userSaleLogs);
        return view('userSaleLogs/index',compact('userSaleLogs'));
    }
	
	public function getDataByDate(Request $request){
		$input = $request->all();
												
		$userSaleLogs = UserSaleLog::select('user_sale_logs.id','first_name','total_kh', 'total_us', 'dates', DB::raw("SUBSTRING(time_in,1,5) AS time_in"), DB::raw("SUBSTRING(time_out,1,5) AS time_out"), DB::raw("SUBSTRING(auto_time_out,1,5) AS auto_time_out"))->join('users', 'users.id','=','user_id')->where('dates', $input['dates'])->where('user_id',Auth::user()->id)->get();
		
		return View::make('userSaleLogs.getDataByDate')->with('userSaleLogs', $userSaleLogs);
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('userSaleLogs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $group)
    {
        //
        $data = $request->all();
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $group->fill($data)->save();
        return Redirect::route('groups.index');
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
        $userSaleLogs = UserSaleLog::find($id);
        return view('userSaleLogs/edit', compact('userSaleLogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSaleLog $userSaleLog)
    {
        //
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $data['total_kh']     = $data['total_kh'];
        $data['total_us']     = $data['total_us'];
        $data['time_out']     = $data['hours'].":".$data['minutes'].":00";
		
        unset($data['hours']);
        unset($data['minutes']);
        $userSaleLog->whereId(Input::get('id'))->update($data);
		
		return Redirect::route('user_sale_logs.index', array('dates'=>$data['dates']));
		//return Redirect::route('user_sale_logs/index/'.$data['dates']);
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
        $group = new Group;
        $group->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('groups.index')->with('flash_notice', 'You are successfully delete!');
    }
}
