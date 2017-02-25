<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\SectionGroup;
use Input;

class SectionGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Index of sections refer as expense group
        $sec = SectionGroup::where('is_active', 1)->get();
        $sectionGroups = json_encode($sec);
        return view('sectionGroups/index',compact('sectionGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //New Group Expenses
        return view('sectionGroups/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionGroup $sectionGroup, Request $request)
    {
        //
        $sectionGroups = $request->all();
        $sectionGroups['created_by']    = \Auth::user()->id;
        $sectionGroups['updated_by']    = \Auth::user()->id;
        $sectionGroups['is_active']    = 1;
        $sectionGroup->fill($sectionGroups)->save();
        return Redirect::route('sectionGroups.index');
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
        $sectionGroup = Section::whereId($id)->first();
        $sectionGroup->updated_at = $sectionGroup->updated_at->timezone('Asia/Phnom_Penh');
        return view('sectionGroups/show', compact('sectionGroup'));
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
        $sectionGroup = SectionGroup::find($id);
        return view('sectionGroups/edit', compact('sectionGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectionGroup $sectionGroups, Request $request)
    {
        //
        $sectionGroup = $request->all();
        unset($sectionGroup['_token']);
        $sectionGroups['created_by']    = \Auth::user()->id;
        $sectionGroups['updated_by']    = \Auth::user()->id;
        $sectionGroups['is_active']    = 1;
        $sectionGroups->whereId(Input::get('id'))->update($sectionGroup);
        return Redirect::route('sectionGroups.index');
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
        $sectionGroup = new SectionGroup;
        $sectionGroup->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('sections.index')->with('flash_notice', 'You are successfully delete!');
    }
}
