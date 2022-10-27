<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\StudentProject;
use App\Http\Requests\StoreStudentProjectRequest;
use App\Http\Requests\UpdateStudentProjectRequest;

class StudentProjectController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::find($request->student)->project->where('project_id','=',$request->project)->first()){
         $studentProject = User::find($request->student)->project->where('project_id','=',$request->project)->first();
         $studentProject->update(['status_id'=>$request->status]);
        }else{
        $studentProject = new StudentProject;
        $studentProject->student_id = $request->student;
        $studentProject->status_id = $request->status;
        $studentProject->project_id = $request->project;
        $studentProject->save();
        }
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentProject  $studentProject
     * @return \Illuminate\Http\Response
     */
    public function show(StudentProject $studentProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentProject  $studentProject
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentProject $studentProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentProjectRequest  $request
     * @param  \App\Models\StudentProject  $studentProject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentProjectRequest $request, StudentProject $studentProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentProject  $studentProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentProject $studentProject)
    {
        //
    }
}
