<?php

namespace App\Http\Livewire;

use App\Models\pointTransaction;
use App\Models\StudentProgress;
use Auth;
use Livewire\Component;

class OpenCloseMilestone extends Component
{
    public $student;
    public $milestone;

    public $status;
    public function mount($student,$milestone)
    {
        $this->student = $student;
        $this->milestone = $milestone;
        $this->status = $this->student->progresses->where('milestone_id','=',$milestone->id)->first() != null;
    }
    public function render()
    {
        return view('livewire.open-close-milestone');
    }
    public function store(){
        $student = $this->student->StudentDetail;
        $StudentProgress = new StudentProgress;
        $StudentProgress->student_id = $this->student->id;
        $StudentProgress->milestone_id = $this->milestone->id;
        if ($StudentProgress->save()) {
            $transaction = new pointTransaction;
            $transaction->student_id = $this->student->id;
            $transaction->employee_id = Auth::user()->id;
            $transaction->point = ($this->milestone->point);
            $transaction->note = "Open Milestone ID " . $this->milestone->id;
            if ($transaction->save()) {
                $student->increment('point', $this->milestone->point);
            }
        }
        $this->status = !$this->status;
    }

    public function destroy(){
        $studentProgress = $this->student->Progresses->where('milestone_id',$this->milestone->id)->first();
        $transaction = new pointTransaction();
        $transaction->student_id = $studentProgress->student->id;
        $transaction->employee_id = Auth::user()->id;
        $transaction->point = -($studentProgress->milestone->point);
        $transaction->note = "Close Milestone ID " . $studentProgress->milestone->id;
        if ($transaction->save() && $studentProgress->delete()) {
            $studentProgress->student->StudentDetail->decrement('point', $transaction->point);
        }



        $this->status = !$this->status;
    }
}