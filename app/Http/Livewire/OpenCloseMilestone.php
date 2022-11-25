<?php

namespace App\Http\Livewire;
use App\Models\StudentProgress;
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
        $student->increment('point',$this->milestone->point);
        $StudentProgress = new StudentProgress;
        $StudentProgress->student_id = $this->student->id;
        $StudentProgress->milestone_id = $this->milestone->id;
        $StudentProgress->save();
        $this->status = !$this->status;
    }

    public function destroy(){
        $studentProgress = $this->student->Progresses->where('milestone_id',$this->milestone->id)->first();
        $studentProgress->student->StudentDetail->decrement('point',$studentProgress->milestone->point);
        $studentProgress->delete();
        $this->status = !$this->status;
    }
}