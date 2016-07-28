<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\UomExpense;
use Input;

class UomExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $us = UomExpense::where('is_active', 1)->get();
        $uomExpenses = json_encode($us);
        return view('uomexpenses/index',compact('uomExpenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('uomExpenses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UomExpense $uom,Request $request)
    {
        //
        $data = $request->all();
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $uom->fill($data)->save();
        return Redirect::route('uomexpenses.index');
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
        $uom = UomExpense::whereId($id)->first();
        return view('uomexpenses/show', compact('uom'));
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
        $uom = UomExpense::find($id);
        return view('uomexpenses/edit', compact('uom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UomExpense $uoms)
    {
        //
        $uom = $request->all();
        unset($uom['_token']);
        unset($uom['_method']);
        $uom['created_by']    = \Auth::user()->id;
        $uom['updated_by']    = \Auth::user()->id;
        $uom['is_active']     = 1;
        $uoms->whereId(Input::get('id'))->update($uom);
        return Redirect::route('uomexpenses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uom = new UomExpense;
        $uom->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('uoms.index')->with('flash_notice', 'You are successfully delete!');
    }
}
