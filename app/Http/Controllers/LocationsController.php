<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Location;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Location::where('is_active', 1)->orderBy('updated_at','desc')->get();
        return view('locations/index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('locations/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Location $location,Request $request)
    {
        //
        $data = $request->all();
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $location->fill($data)->save();
        return Redirect::route('locations.index');
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
        $loc = Location::whereId($id)->first();
        return view('locations/show', compact('loc'));
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
        $location = Location::find($id);        
        return view('locations/edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $locations)
    {
        //
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $locations->whereId(Input::get('id'))->update($data);
        return Redirect::route('locations.index');
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
        $loc = new Location;
        $loc->where('id', $id)->update(['is_active' => 0]);
        return Redirect::route('locations.index')->with('flash_notice', 'You are successfully delete!');
    }
}
