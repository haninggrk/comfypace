<?php

namespace App\Http\Controllers;

use App\Models\StudentRewardTransaction;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\pointTransaction;

use App\Http\Requests\StoreStudentRewardTransactionRequest;
use App\Http\Requests\UpdateStudentRewardTransactionRequest;

class StudentRewardTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('showTransaction');
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
     * @param  \App\Http\Requests\StoreStudentRewardTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reward = new StudentRewardTransaction;
        $reward->status_id = $request->status;
        $reward->reward_id = $request->reward;
        $reward->student_id = $request->student;
        if($reward->save()){
            $student = User::find($request->student)->StudentDetail;
            $transaction = new pointTransaction;
            $transaction->student_id = $request->student;
            $transaction->employee_id = User::find($request->student)->id;
            $transaction->point = $request->point;
            $transaction->note = "Tukar Reward";
            if($transaction->save()){
                    $student->decrement('point',$request->point);
            }
        }
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentRewardTransaction  $studentRewardTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRewardTransaction $studentRewardTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentRewardTransaction  $studentRewardTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRewardTransaction $studentRewardTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRewardTransactionRequest  $request
     * @param  \App\Models\StudentRewardTransaction  $studentRewardTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRewardTransactionRequest $request, StudentRewardTransaction $studentRewardTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentRewardTransaction  $studentRewardTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $reward = StudentRewardTransaction::find($request->id);
        if($reward->delete()){
            $student = User::find($request->student)->StudentDetail;
            $transaction = new pointTransaction;
            $transaction->student_id = $request->student;
            $transaction->employee_id = User::find($request->student)->id;
            $transaction->point = $request->point;
            $transaction->note = "Refund Reward";
            if($transaction->save()){
                    $student->increment('point',$request->point);
            }
        }
        return back();
    }
}
