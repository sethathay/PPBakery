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
        $sv = Service::select('services.*','sections.name AS section_name')->join('sections','sections.id','=','section_id')->where('services.is_active', 1)->get();
        $services = json_encode($sv);
        $sections = DB::table('sections')->lists('name', 'id');
        return view('services/index',compact('services','sections'));
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
        return view('services/create',compact('sections'));
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
        return view('services/show', compact('sections','service'));
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
        return view('services/edit', compact('service','sections'));
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
}
