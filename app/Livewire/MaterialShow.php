<?php

namespace App\Livewire;

use App\Models\Material;
use Livewire\Component;

class MaterialShow extends Component
{
    public $meatMate;
    public $fishMate;
    public $vegeMate;
    public $fruitMate;
    public $dairyMate;
    public $noodleMate;
    public $otherMate;

    public function mount() {
        $this->meatMate = Material::where('material_type', '肉類')->get();
        $this->fishMate = Material::where('material_type', '魚介類')->get();
        $this->vegeMate = Material::where('material_type', '野菜')->get();
        $this->fruitMate = Material::where('material_type', '果物')->get();
        $this->dairyMate = Material::where('material_type', '乳製品')->get();
        $this->noodleMate = Material::where('material_type', '麺類')->get();
        $this->otherMate = Material::where('material_type', 'その他')->get();
    }

    public function render()
    {
        return view('livewire.material-show');
    }
}
