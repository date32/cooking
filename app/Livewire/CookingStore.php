<?php

namespace App\Livewire;

use App\Models\Date;
use App\Models\Menu;
use App\Models\Timing;
use Livewire\Component;
use Livewire\WithFileUploads;

class CookingStore extends Component
{
    use WithFileUploads;

    public $cookingDate;
    public $menus;
    public $menu;
    public $timings;
    public $timing;

    public function mount() {
        $this->menus = Menu::get();
        $this->timings = Timing::get();
    }

    public function cookingStore() {
        $date = new Date();
        $date->date = $this->cookingDate;
        $date->menu_id = $this->menu;
        $date->timing_id = $this->timing;
        $date->save();

        return redirect()->route('cookingStore');
    }
    
    public function render()
    {
        return view('livewire.cooking-store');
    }
}
