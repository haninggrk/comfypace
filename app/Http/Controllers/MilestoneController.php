<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectMilestone;
use App\Models\User;

use Auth;
class MilestoneController extends Controller
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

        $str_time = $request->video_start;

        $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
        
        sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
        
        $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;


        $str_time = $request->video_end;

        $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);
        
        sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
        
        $time_seconds2 = $hours * 3600 + $minutes * 60 + $seconds;

        $milestone = new ProjectMilestone;
        $milestone->video_url = $request->video_url;
        $milestone->studentmodul_url = $request->studentmodul_url;
        $milestone->milestone = $request->milestone;
        $milestone->description = $request->description;
        $milestone->point = $request->point;
        $milestone->project_id= $request->project_id;
        $milestone->orderno = $request->orderno;
        $milestone->video_start =  $time_seconds;
        $milestone->video_end = $time_seconds2;

        $milestone->save();
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
        if(Auth::user()->role == 2){
            if(Auth::user()->Progresses->where('milestone_id','=',$id)->first()!=null){
                return view('showMilestone')->with('milestone',ProjectMilestone::find($id));
            }else{
                return back();
            }
        
        }else{
            return view('showMilestone')->with('milestone',ProjectMilestone::find($id));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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
        $milestone = ProjectMilestone::find($id);
        $milestone->delete();
    }
}
