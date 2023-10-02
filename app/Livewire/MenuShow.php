<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MenuShow extends Component
{
    public $menus;

    public function mount() {
        $this->menus = Menu::with('likesAndDislikes.user', 'likesAndDislikes.evaluation')->get();
    }

    public function render()
    {
        return view('livewire.menu-show');
    }
}
