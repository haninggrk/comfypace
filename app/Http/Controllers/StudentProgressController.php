<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StudentProgress;
use App\Models\StudentDetail;
use App\Models\User;

use App\Http\Requests\StoreStudentProgressRequest;
use App\Http\Requests\UpdateStudentProgressRequest;
use App\Models\pointTransaction;
use Auth;

class StudentProgressController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentProgressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = User::find($request->student_id)->StudentDetail;
        $StudentProgress = new StudentProgress;
        $StudentProgress->student_id = $request->student_id;
        $StudentProgress->milestone_id = $request->milestone_id;
        if ($StudentProgress->save()) {
            $transaction = new pointTransaction;
            $transaction->student_id = $request->student_id;
            $transaction->employee_id = Auth::user()->id;
            $transaction->point = ($request->point);
            $transaction->note = "Open Milestone ID " . $request->milestone_id;
            if ($transaction->save()) {
                $student->increment('point', $request->point);
            }
        }






        return redirect(url()->previous() . "#goHere");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentProgress  $studentProgress
     * @return \Illuminate\Http\Response
     */
    public function show(StudentProgress $studentProgress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentProgress  $studentProgress
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentProgress $studentProgress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentProgressRequest  $request
     * @param  \App\Models\StudentProgress  $studentProgress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentProgressRequest $request, StudentProgress $studentProgress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentProgress  $studentProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentProgress = StudentProgress::find($id);


        $transaction = new pointTransaction;
        $transaction->student_id = $studentProgress->student->id;
        $transaction->employee_id = Auth::user()->id;
        $transaction->point = ($studentProgress->milestone->point);
        $transaction->note = "Open Milestone ID " . $studentProgress->milestone->id;
        if ($transaction->save() && $studentProgress->delete()) {
            $studentProgress->student->StudentDetail->decrement('point', $transaction->point);
        }

        return redirect(url()->previous() . "#goHere");
    }
}
