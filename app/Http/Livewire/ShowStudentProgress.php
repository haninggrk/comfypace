<?php

namespace App\Http\Livewire;

use App\Models\Classes;
use App\Models\Project;
use App\Models\ProjectMilestone;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudentProgress extends Component
{
    use WithPagination;
    public $search = '';
    public $milestone = null;    
    public $class_id = null;
    public $class = null;
    public function render(){
 
        return view('livewire.show-student-progress')->with('studentList',User::where('role','=',2)->whereIn('id',Classes::find($this->class_id)
        ->ClassMembers->pluck('student_id'))->where('name', 'like', '%'.$this->search.'%')->paginate(5));
    }
    public function mount($id){
        $this->class_id = $id;
        $this->class = Classes::find($id);
        $this->milestone = ProjectMilestone::all();
    }

}
