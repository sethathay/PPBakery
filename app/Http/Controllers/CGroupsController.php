<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Cgroup;
use Input;
use DB;

class CGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cg = Cgroup::where('is_active', 1)->get();
        $cgroups = json_encode($cg);
        return view('cgroups/index',compact('cgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cgroups/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cgroup $cgroup, Request $request)
    {
        //
        $data = $request->all();
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $cgroup->fill($data)->save();
        return Redirect::route('cgroups.index');
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
        $cgroup = Cgroup::whereId($id)->first();
        return view('cgroups/show', compact('cgroup'));
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
        $cgroup = Cgroup::find($id);
        return view('cgroups/edit', compact('cgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cgroup $cgroups)
    {
        //
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $data['created_by']    = \Auth::user()->id;
        $data['updated_by']    = \Auth::user()->id;
        $data['is_active']     = 1;
        $cgroups->whereId(Input::get('id'))->update($data);
        return Redirect::route('cgroups.index');
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
        $cgroup = new Cgroup;
        $cgroup->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('cgroups.index')->with('flash_notice', 'You are successfully delete!');
    }
}
