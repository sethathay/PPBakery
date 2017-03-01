<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Group;
use App\Modules;
use App\Permission;
use Input;
use DB;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $g = Group::where('is_active', 1)->get();
        $groups = json_encode($g);
        return view('groups/index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menus = Modules::where('is_active',1)->orderBy('order')->get();
        return view('groups/create',compact('menus'));
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
        $group_id = $group->id;
        
        foreach ($data['menu_id'] as $m){
            $obj = new Permission();
            $obj->group_id = $group_id;
            $obj->module_id = $m;
            $obj->save();
        }
        
        return Redirect::route('groups.index');
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
        $group = Group::whereId($id)->first();
        $menus = Modules::where('is_active',1)->get();
        $permissions = Permission::where('group_id',$id)->get();
        return view('groups/show', compact('group','menus','permissions'));
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
        $group = Group::find($id);
        $menus = Modules::where('is_active',1)->get();
        $permissions = Permission::where('group_id',$id)->get();
        return view('groups/edit', compact('group','menus','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $groups)
    {
        //
        $id = Input::get('id');
        $data = $request->all();        
        unset($data['_token']);
        unset($data['_method']);
        $updatedData = array();
        $updatedData['created_by']    = \Auth::user()->id;
        $updatedData['updated_by']    = \Auth::user()->id;
        $updatedData['is_active']     = 1;
        $updatedData['name']          = $data['name'];  
        $groups->whereId($id)->update($updatedData);
        
        Permission::where('group_id',$id)->delete();
        
        foreach ($data['menu_id'] as $m){
            $obj = new Permission();
            $obj->group_id = $id;
            $obj->module_id = $m;
            $obj->save();
        }
        return Redirect::route('groups.index');
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
        
        Permission::where('group_id',$id)->delete();
        
        //return Redirect::route('groups.index')->with('flash_notice', 'You are successfully delete!');
    }
}
