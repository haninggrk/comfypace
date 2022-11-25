<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class DestroyHand extends Component
{
    public $order;
    public $is_raised_hand;
    public $student;
    public $studentList;

    public function mount($student,$studentList)
    {
        $this->is_raised_hand = $student->is_raised_hand;
        $this->student = $student;
        $this->studentList = $studentList;

    }
    public function render()
    {
      
        $this->is_raised_hand = User::find($this->student->id)->is_raised_hand;
        return view('livewire.destroy-hand');
    }
    public function destroyHand(){
        $user = $this->student;
        $user->is_raised_hand = 0;
        $user->save();
        $this->is_raised_hand = 0;
    }
}
