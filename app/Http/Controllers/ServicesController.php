<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Service;
use Input;
use DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sv = Service::select('services.*','sections.name AS section_name', 'uom_expenses.name AS uom_expense_name')->join('sections','sections.id','=','section_id')->leftJoin('uom_expenses','uom_expenses.id','=','uom_expense_id')->where('services.is_active', 1)->get();
        $services = json_encode($sv);
        $sections = DB::table('sections')->lists('name', 'id');
        $uom = DB::table('uom_expenses')->lists('name', 'id');
		$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
        return view('services/index',compact('services','sections', 'uom', 'exchangerate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$sections = DB::table('sections')->where('is_active',1)->orderBy('id', 'desc')->lists('name','id');
		$uom = DB::table('uom_expenses')->where('is_active',1)->orderBy('id', 'desc')->lists('name','id');
        return view('services/create',compact('sections', 'uom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Service $service,Request $request)
    {
        //
        $data = $request->all();
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $data['company_id']    = 1;
        $service->fill($data)->save();
        return Redirect::route('services.index');
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
        $service = Service::whereId($id)->first();
        $sections = DB::table('sections')->lists('name', 'id');
        $uom = DB::table('uom_expenses')->lists('name', 'id');
        return view('services/show', compact('sections','service', 'uom'));
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
        $service = Service::find($id);
		$sections = DB::table('sections')->where('is_active',1)->orderBy('id', 'desc')->lists('name','id');
		$uom = DB::table('uom_expenses')->where('is_active',1)->orderBy('id', 'desc')->lists('name','id');
        return view('services/edit', compact('service','sections','uom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $services)
    {
        //
        $service = $request->all();
        unset($service['_token']);
        unset($service['_method']);
        $service['created_by']    = \Auth::user()->id;
        $service['updated_by']    = \Auth::user()->id;
        $service['is_active']     = 1;
        $service['company_id']    = 1;
        $services->whereId(Input::get('id'))->update($service);
        return Redirect::route('services.index');
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
        $service = new Service;
        $service->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('services.index')->with('flash_notice', 'You are successfully delete!');
    }
	
	public function expense()
    {
        //
		$exchangerate = DB::table('exchange_rates')->orderBy('id', 'desc')->first();
		$sections = DB::table('sections')->where('is_active',1)->orderBy('id', 'desc')->lists('name','id');
		$uom = DB::table('uom_expenses')->where('is_active',1)->orderBy('id', 'desc')->lists('name','id');
        return view('services/expense',compact('sections', 'uom','exchangerate'));
    }
	
	public function addExpense(Request $request, Service $services){
		
        $inputs = $request->all();
		
		for($i=0; $i<count($inputs['txt_total_by_item']); $i++){
			$service = new Service;
			$service['created_by']    	= \Auth::user()->id;
			$service['updated_by']   	= \Auth::user()->id;
			$service['is_active']    	= 1;
			$service['company_id']    	= 1;
			$service['section_id']    	= $inputs['section_id'][$i];
			$service['uom_expense_id']  = $inputs['uom_expense_id'][$i];
			$service['qty']    			= $inputs['txt_qty'][$i];
			$service['expense_date']    = $inputs['expense_date'];
			$service['expense_time']    = $inputs['times'][$i].":".$inputs['minutes'][$i];
			$service['exchange_rate_id']    = $inputs['exchange_rate_id'];
			$service['riel_price']    = $inputs['txt_unit_price'][$i];
			$service['dollar_price']    = $inputs['txt_unit_price_us'][$i];
			$service->save();		
		}
		
		return "success";
	}
}
