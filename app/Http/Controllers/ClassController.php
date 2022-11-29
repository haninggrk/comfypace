<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\ClassMember;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 2){
        return view('manageClass')->with('classList', auth()->user()->ClassMembers);
    }elseif(auth()->user()->role == 1 && auth()->user()->EmployeeDetail->position_id<3){
        return view('manageClass')->with('classList', auth()->user()->SupClasses);
    }else{
        return view('manageClass')->with('classList', Classes::all());
    }
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
        $classes = new classes;
        $classes->classname = $request->classname;
        $classes->startdate = $request->startdate;
        $classes->enddate = $request->enddate;
        $classes->description = $request->description;
        $classes->course_id = $request->course;
        $classes->location_id = $request->location;
        $classes->supervisor_id = $request->supervisor;
        $classes->classtype_id = $request->classtype;
        $classes->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('showClass')
        ->with('class',Classes::find($id))
        ->with('studentList',User::all()->where('role','=',2)->whereNotIn('id',Classes::find($id)
        ->ClassMembers->pluck('student_id')));
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
