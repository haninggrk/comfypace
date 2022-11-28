<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\studentDetail;

class StudentController extends Controller
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
        $student = new studentDetail;
        $student->name = $request->fullname;
        $student->nickname = $request->nickname;
        $student->email = $request->email;
        $student->password = $request->password;
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
        $student->save();
        return redirect('/manage-student');
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
