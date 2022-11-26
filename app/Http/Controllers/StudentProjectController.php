<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\StudentProject;
use App\Http\Requests\StoreStudentProjectRequest;
use App\Http\Requests\UpdateStudentProjectRequest;
use Auth;

class StudentProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manageStudentProject', ['studentProjects' => StudentProject::all()]);
    }

    public function indexStudent()
    {
        return view('manageStudentProject', ['studentProjects' => Auth::user()->projects]);
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
    public function store2(Request $request){
        
        if(User::find($request->student)->project->where('project_id','=',$request->project)->first()){
            $studentProject = User::find($request->student)->project->where('project_id','=',$request->project)->first();
            $studentProject->update([
            'submission_url'=>$request->submission_url,
        ]
    
    );
    $studentProject->submission_title = $request->submission_title;
    $studentProject->save();

           }else{
           $studentProject = new StudentProject;
           $studentProject->student_id = $request->student;
           $studentProject->status_id = 1;
           $studentProject->project_id = $request->project;
           $studentProject->submission_url = $request->submission_url;
           $studentProject->submission_title = $request->submission_title;
           $studentProject->save();
           
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentProject  $studentProject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentProject = StudentProject::find($id);
        return view('showStudentProject', ['studentProject' => $studentProject]);
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
