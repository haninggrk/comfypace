<?php

namespace App\Http\Controllers;

use App\Models\pointTransaction;
use App\Http\Requests\StorepointTransactionRequest;
use App\Http\Requests\UpdatepointTransactionRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class PointTransactionController extends Controller
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
     * @param  \App\Http\Requests\StorepointTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = User::find($request->student_id)->StudentDetail;
        $transaction = new pointTransaction;
        $transaction->student_id = $request->student_id;
        $transaction->employee_id = Auth::user()->id;
        $transaction->point = $request->point;
        $transaction->note = $request->note;
        if($transaction->save()){
                $student->increment('point',$request->point);
        }
    return back();
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pointTransaction  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(pointTransaction $pointTransaction)
    {
     

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pointTransaction  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(pointTransaction $pointTransaction)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepointTransactionRequest  $request
     * @param  \App\Models\pointTransaction  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepointTransactionRequest $request, pointTransaction $pointTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pointTransaction  $pointTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(pointTransaction $pointTransaction)
    {
        //
    }
}
