<?php

namespace App\Http\Controllers;

use App\Models\studentDetail;
use App\Models\User;
use App\Models\School;
use App\Http\Requests\StorestudentDetailRequest;
use App\Http\Requests\UpdatestudentDetailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manageStudent')->with('schoolList',School::all())->with('studentList',User::where('role',2)->get());
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
     * @param  \App\Http\Requests\StorestudentDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User;
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->save();

        $student = new studentDetail;
        $student->nickname = $request->nickname;
        $student->phone = $request->phone;
        $student->sosmed01 = $request->sosmed1;
        $student->sosmed02 = $request->sosmed2;
        $student->sosmed03 = $request->sosmed3;
        $student->gender = $request->gender;
        $student->birthdate = $request->birthdate;
        $student->nationality = $request->nationality;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->province = $request->province;
        $student->country = $request->nationality;
        $student->postcode = $request->postcode;
        $student->photo = $request->photo;
        $student->note01 = $request->note01;
        $student->note02 = $request->note02;
        $student->note03 = $request->note03;
        $student->school_id = $request->school;
        $student->status_id = $request->status;
        $student->user_id = $user->id;
        $student->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\studentDetail  $studentDetail
     * @return \Illuminate\Http\Response
     */
    public function show($studentDetail)
    {
        return view('showStudent')->with('student',User::find($studentDetail));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\studentDetail  $studentDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(studentDetail $studentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestudentDetailRequest  $request
     * @param  \App\Models\studentDetail  $studentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatestudentDetailRequest $request, studentDetail $studentDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\studentDetail  $studentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(studentDetail $studentDetail)
    {
        //
    }
}
