<?php

namespace App\Livewire;

use App\Models\Date;
use App\Models\Material;
use App\Models\MaterialOfMenu;
use App\Models\Menu;
use App\Models\Timing;
use Livewire\Component;

class Help extends Component
{
    public $dates; //DBから最新の調理日を４つ取得
    public $menus; //DBからすべてのメニューを取得
    public $screen = 1;

    public $choiceMenu;
    public $timings;
    public $decisionMenuTimingId;

    public $materials; //DBからすべての材料を取得

    public $choiceMaterialsId = []; //フォームから選んだ材料のID
    public $choiceMaterials = []; //上記IDから材料情報を取得
    public $resultMenus; //選んだ材料が１つでも入っているメニューの配列
    public $trueMenu;
    public $falseMenu;

    public function mount()
    {
        $this->dates = Date::with(['timing', 'menu.likesAndDislikes.user'])->orderBy('date', 'desc')->take(6)->get();
        $this->menus = Menu::with('materialOfMenus.material')->get();
        $this->materials = Material::with('materialOfMenus.menu')->get();
    }

    public function choice($id)
    {
    
        if( $this->choiceMaterials) { //screen3から来た場合
            $this->screen = 4;
            $this->choiceMenu = Menu::find($id);
            $this->timings = Timing::get();
        }else {
            $this->screen = 2;
            $this->choiceMenu = Menu::find($id);
            $this->timings = Timing::get();
        }
    }

    public function decision($id)
    {
        $date = new Date();
        $date->menu_id = $id;
        $date->timing_id = $this->decisionMenuTimingId;
        // 今日の日付けを取得する
        $todayDate = date("Y-m-d");
        $date->date = $todayDate;
        $date->save();

        return redirect()->route('help');
    }

    public function choiceMaterialsForMenu()
    {
        $this->screen = 3;

        // フォームから選んだ材料を取得
        // $this->choiceMaterials = Material::whereIn('id', $this->choiceMaterialsId)->get();
        $choiceMaterials = Material::whereIn('id', $this->choiceMaterialsId)->get();
        foreach($choiceMaterials as $item) {
            $this->choiceMaterials[] = $item->material_name;            
        }

        // フォームから選んだ材料を含むメニューを取得
        $moms = MaterialOfMenu::with('menu')->whereIn('material_id', $this->choiceMaterialsId)->get();
        foreach ($moms as $mom) {
            $m[] = $mom->menu;
        }
        // 重複を削除して新しい配列を作る
        $newM = array_unique($m);
        // 連想配列を配列にする
        $newM = array_values($newM);

        // 材料をリレーションしたメニューを取得
        foreach ($newM as $menu) {
            $needMenuId[] = $menu->id;
        }
        $this->resultMenus = Menu::with('materialOfMenus.material')->whereIn('id', $needMenuId)->get();

        // 選んだ材料の配列
        foreach ($choiceMaterials as $mate) {
            $choiceMates[] = $mate->material_name;
        }

        // メニューの材料の配列
        $trueId = null; //初期
        $falseId = null; //初期

        foreach ($this->resultMenus as $items) {
            foreach ($items->materialOfMenus as $item) {
                $menuMate[] = $item->material->material_name;
            }

            // 配列の値を比較し、1つでも不一致があればfalseを返す
            $result = !array_diff($menuMate, $choiceMates);
            if ($result) {
                $trueId[] = $items->id;
            } else {
                $falseId[] = $items->id;
            }
        }

        // 作れるメニューと作れないメニューを上記のメニューIdからメニュー情報を取得する
        if($trueId) {
            $this->trueMenu = Menu::with('materialOfMenus.material')->whereIn('id', $trueId)->get();
        }
        if($falseId) {
            $this->falseMenu = Menu::with('materialOfMenus.material')->whereIn('id', $falseId)->get();
        }

    }

    public function screen3()
    {
        $this->screen = 3;
    }

    public function render()
    {
        return view('livewire.help');
    }
}
