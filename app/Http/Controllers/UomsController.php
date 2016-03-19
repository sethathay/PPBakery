<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Uom;
use Input;

class UomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$uoms = Uom::where('is_active', 1)->orderBy('updated_at','desc')->simplePaginate(12);
        //return view('uoms/index',compact('uoms'));

        $us = Uom::where('is_active', 1)->get();
        $uoms = json_encode($us);
        return view('uoms/index',compact('uoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('uoms/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Uom $uom,Request $request)
    {
        //
        $data = $request->all();
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $uom->fill($data)->save();
        return Redirect::route('uoms.index');
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
        $uom = Uom::whereId($id)->first();
        return view('uoms/show', compact('uom'));
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
        $uom = Uom::find($id);
        return view('uoms/edit', compact('uom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uom $uoms)
    {
        //
        $uom = $request->all();
        unset($uom['_token']);
        unset($uom['_method']);
        $uom['created_by']    = \Auth::user()->id;
        $uom['updated_by']    = \Auth::user()->id;
        $uom['is_active']     = 1;
        $uoms->whereId(Input::get('id'))->update($uom);
        return Redirect::route('uoms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uom = new Uom;
        $uom->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('uoms.index')->with('flash_notice', 'You are successfully delete!');
    }
}
