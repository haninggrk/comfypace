<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\User;

class RaiseHand extends Component
{

    public $userId = null;
    public $toggleUser = null;

    public function render()
    {
        return view('livewire.raise-hand');
    }

    public function mount() {

        if(!$this->userId) {
            $this->toggleUser = Auth::user();
        }else {
            $this->toggleUser = User::find($this->userId);   
        }
    }

    public function toggleHand() {

        if($this->toggleUser->is_raised_hand === 0) {
            $this->toggleUser->is_raised_hand = 1;
            $this->toggleUser->save();
        }else {
            $this->toggleUser->is_raised_hand = 0;
            $this->toggleUser->save();
        }

    }
}
