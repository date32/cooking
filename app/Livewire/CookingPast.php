<?php

namespace App\Livewire;

use App\Models\Date;
use Livewire\Component;

class CookingPast extends Component
{

    public $yearMonth;
    public $dates;

    public function mount(string $id) {
        $this->yearMonth = $id;
        $this->dates = Date::with(['menu', 'timing'])->where('date', 'like', '%' . $id . '%')->orderBy('date', 'desc')->get();
    }

    public function dateDelete($id)
    {
        Date::find($id)->delete();
        return redirect('/cooking/show/' . $this->yearMonth);
    }

    public function reloadPage()
    {
        // $refreshメソッドを呼び出してページをリロード
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.cooking-past');
    }
}
