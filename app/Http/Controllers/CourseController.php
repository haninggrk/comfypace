<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Project;
use App\Models\CourseCategory;
use App\Models\CourseLevel;
use App\Models\Location;
use App\Models\Classtype;
use App\Models\employeeDetail;






class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manageCourse')
        ->with('courseList',Course::all())
        ->with('categoryList',CourseCategory::all())
        ->with('levelList',CourseLevel::all());
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
        $course = new course;
        $course->code = $request->code;
        $course->course = $request->course;
        $course->img = $request->image;
        $course->totalmeets = $request->totalmeets;
        $course->age_requirement = $request->age_requirement;
        $course->level_id = $request->level;
        $course->category_id = $request->category;
        $course->description = $request->description;
        $course->application = $request->application;
        $course->save();
        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('showCourse')->with('course',Course::find($id))
        ->with('classList',Classes::where('course_id','=',$id)->get())
        ->with('projectList',Project::where('course_id','=',$id)->get())
        ->with('courseList',Course::all())
        ->with('supervisorList',employeeDetail::where('position_id','=',2)->get())
        ->with('classtypeList',Classtype::all())
        ->with('locationList',Location::all());
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
