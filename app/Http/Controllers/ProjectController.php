<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectMilestone;
use App\Models\ClassMember;
use App\Models\Classes;

use App\Models\User;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project;
        $project->project_title = $request->projecttitle;
        $project->description = $request->description;
        $project->teachmodul_url = $request->teachmodul;
        $project->example_url = $request->example;
        $project->application = $request->application;
        $project->image = $request->image;
        $project->course_id = $request->course;
        $project->save();
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $class = $request->class;
        return view('showProject')
        ->with('project',Project::find($id))
        ->with('milestoneList',ProjectMilestone::where('project_id','=',$id)->orderBy('orderno')->get())
        ->with('studentList',User::wherein('id',ClassMember::where('class_id','=',$class)->pluck('student_id'))->get())
        ->with('classList',Classes::all());
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
