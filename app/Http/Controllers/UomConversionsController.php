<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\UomConversion;
use App\Uom;
use Input;
use DB;

class UomConversionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $conv = UomConversion::select('uom_conversions.*','u1.name as from_uom','u2.name as to_uom')
        ->join('uoms as u1','u1.id','=','from_uom_id')->join('uoms as u2','u2.id','=','to_uom_id')
        ->where('uom_conversions.is_active', 1)->get();
        $conversions = json_encode($conv);
        $uoms = DB::table('uoms')->lists('name', 'id');
        return view('uomconversions/index',compact('conversions','uoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $uoms = DB::table('uoms')->where('is_active',1)->lists('name','id');
        return view('uomconversions/create',compact('uoms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UomConversion $uomconversion,Request $request)
    {
        //
        $data = $request->all();
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $uomconversion->fill($data)->save();
        return Redirect::route('uomconversions.index');
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
        $uomconv = UomConversion::whereId($id)->first();
        $uoms = DB::table('uoms')->lists('name', 'id');
        return view('uomconversions/show', compact('uomconv','uoms'));
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
        $uomconv = UomConversion::find($id);
        $uoms = DB::table('uoms')->lists('name', 'id');
        return view('uomconversions/edit', compact('uomconv','uoms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UomConversion $uomconv)
    {
        //
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $uomconv->whereId(Input::get('id'))->update($data);
        return Redirect::route('uomconversions.index');
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
        $uomconv = new UomConversion;
        $uomconv->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('uomconversions.index')->with('flash_notice', 'You are successfully delete!');
    }
}
