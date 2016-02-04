<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Section;
use Input;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Index of sections refer as expense group
        $sections = Section::where('is_active', 1)->get();
        return view('sections/index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //New Group Expenses
        return view('sections/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Section $section, Request $request)
    {
        //
        $sections = $request->all();
        $sections['created_by']    = \Auth::user()->id;
        $sections['updated_by']    = \Auth::user()->id;
        $sections['is_active']    = 1;
        $section->fill($sections)->save();
        return Redirect::route('sections.index');
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
        $section = Section::whereId($id)->first();
        $section->updated_at = $section->updated_at->timezone('Asia/Phnom_Penh');
        return view('sections/show', compact('section'));
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
        $section = Section::find($id);
        return view('sections/edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Section $sections, Request $request)
    {
        //
        $section = $request->all();
        unset($section['_token']);
        $sections['created_by']    = \Auth::user()->id;
        $sections['updated_by']    = \Auth::user()->id;
        $sections['is_active']    = 1;
        $sections->whereId(Input::get('id'))->update($section);
        return Redirect::route('sections.index');
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
        $section = new Section;
        $section->where('id', $id)->update(['is_active' => 0]);
        //return Redirect::route('sections.index')->with('flash_notice', 'You are successfully delete!');
    }
}