<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class MemberShow extends Component
{
    public $members;

    public function mount() {
        $this->members = User::with(['likesAndDislikes.evaluation', 'likesAndDislikes.menu'])->get();
    }
    public function render()
    {
        return view('livewire.member-show');
    }
}
