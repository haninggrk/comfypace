<?php

namespace App\Http\Controllers;

use App\Models\employeeDetail;
use App\Models\EmployeePosition;
use App\Models\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Requests\StoreemployeeDetailRequest;
use App\Http\Requests\UpdateemployeeDetailRequest;

class EmployeeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('showEmployee')
            ->with('employees', User::where('role', '1')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('manageEmployee')->with('roleList', UserRole::all())->with('positionList', EmployeePosition::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreemployeeDetailRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // TODO: Tambahin tampilan error supaya user tau error dimana

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],

            'position' => ['required'],
            'city' => ['required'],
            'gender' => ['required'],

            'NIK' => ['required'],
            'Phone' => ['required'],
            'province' => ['required'],
            'education' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
        ]);


        $employee = new EmployeeDetail;
        $employee->position_id = $request->position;
        $employee->city = $request->city;
        $employee->gender = $request->gender;
        $employee->birthdate = $request->birthdate;
        $employee->user_id = $user->id;
        $employee->NIK = $request->NIK;
        $employee->phone = $request->Phone;
        $employee->sosmed01 = $request->sosmed01;
        $employee->sosmed02 = $request->sosmed01;
        $employee->sosmed03 = $request->sosmed01;
        $employee->address = $request->address;
        $employee->province = $request->province;
        $employee->postcode = $request->postcode;
        $employee->country = $request->country;
        $employee->bankaccount = $request->bankaccount;
        $employee->education = $request->education;
        $employee->occupation = $request->occupation; //
        $employee->photo = $request->photo;
        $employee->save();



        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\employeeDetail $employeeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        return view('employeeDetail')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\employeeDetail $employeeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(employeeDetail $employeeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateemployeeDetailRequest $request
     * @param \App\Models\employeeDetail $employeeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $employee = employeeDetail::find($request->id);
        
        $user = $employee->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $data = array_filter($request->except(['name','email']));
        $employee->update($data);
        return $this->show($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\employeeDetail $employeeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(employeeDetail $employeeDetail)
    {
        //
    }


}
