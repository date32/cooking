<?php

namespace App\Livewire;

use App\Models\Date;
use Livewire\Component;
use Carbon\Carbon;

class CookingShow extends Component
{
    public $dates;

    public function mount()
    {
        // 現在の年月を取得
        $now = Carbon::now();
        // 今月のデータを取得
        $this->dates = Date::with(['menu', 'timing'])->whereYear('date', $now->year)->whereMonth('date', $now->month)->orderBy('date', 'desc')->get();
    }

    public function dateDelete($id)
    {
        Date::find($id)->delete();
        return redirect()->route('cookingShow');
    }

    public function render()
    {
        return view('livewire.cooking-show');
    }
}
