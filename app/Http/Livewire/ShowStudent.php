<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\studentDetail;
use App\Models\User;
use Livewire\Component;

class ShowStudent extends Component
{
    public function render()
    {
        return view('livewire.show-student',[
            'studentList'=> User::where('role','=',2)->paginate(10),
            'schoolList'=>School::all(),
        ]);
    }
}
