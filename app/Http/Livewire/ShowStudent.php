<?php

namespace App\Http\Livewire;

use App\Models\School;
use App\Models\studentDetail;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudent extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        return view('livewire.show-student', [
            'studentList' => User::where('role', '=', 2)->where('name', 'like', '%'.$this->search.'%')->paginate(10),
            'schoolList' => School::all(),
        ]);
    }
    public function updatingSearch()

    {

        $this->resetPage();

    }
}
