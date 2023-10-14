<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\MaterialOfMenu;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class MenuEdit extends Component
{
    use WithFileUploads;

    public $menuDetail; //変更するメニュー情報
    public $materials = []; //変更するメニューの材料情報
    public $menu_name;
    public $allMaterials; //DBの材料取得
    public $material_name;
    public $menu_img;
    public $screen = 1;
    public $materialsUpdate = [];

    protected $rules = [
        'menu_name' => 'unique:menus,menu_name',
    ];
    protected $messages = [
        'menu_name.unique' => 'このメニューは登録されています',
    ];

    public function mount(string $id)
    {
        $this->menuDetail = Menu::with('likesAndDislikes.user', 'likesAndDislikes.evaluation')->find($id);
        $this->materials = Menu::with('materialOfMenus.material')->find($id);
        $this->allMaterials = Material::get();
    }
    public function menuUpdate()
    {
        $validatedData = $this->validate();
        $menuDetail = Menu::find($this->menuDetail->id);
        if ($this->menu_name != null) {
            $menuDetail->menu_name = $this->menu_name;
        }
        if ($this->menu_img != null) {
            // 画像とメニュー名を変更する時
            if ($this->menu_name != null) {
                // ディレクトリ名
                $dir = 'img';
                // ファイル名変更
                $file_name = $this->menu_name . '.jpg';
                // ファイルを保存　storageというフォルダに保存される
                $this->menu_img->storeAs('public/' . $dir, $file_name);
                // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
                $menuDetail->menu_img = '/storage' . '/' . $dir . '/' . $file_name;
            }
            // 画像のみ変更する時（画像のファイル名を上書きまたは新規保存する）
            if ($this->menu_name == null) {
                // メニュー名を取得
                $name = $this->menuDetail->menu_name;
                // ディレクトリ名
                $dir = 'img';
                // ファイル名変更
                $file_name = $name . '.jpg';
                // ファイルを保存　storageというフォルダに保存される
                $this->menul_img->storeAs('public/' . $dir, $file_name);
                // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
                $menuDetail->menu_img = '/storage' . '/' . $dir . '/' . $file_name;
            }
        }
        $menuDetail->save();

        // 材料変更がある場合
        if ($this->materialsUpdate != null) {
            foreach ($this->materialsUpdate as $item) {
                $mate_menu = new MaterialOfMenu();
                $mate_menu->menu_id = $this->menuDetail->id;
                $mate_menu->material_id = $item;
                $mate_menu->save();
            }
        }

        return redirect('/menu/edit/' . $this->menuDetail->id);
    }
    public function materialDelete(String $id) {
        $deleteData = MaterialOfMenu::where('menu_id', $this->menuDetail->id)->where('material_id', $id)->first();
        $deleteData->delete();
        return redirect('/menu/edit/' . $this->menuDetail->id);
    }
    public function menuDelete()
    {
        $materialDelete = Menu::find($this->menuDetail->id);
        $materialDelete->delete();

        return redirect()->route('menuShow');
    }

    public function screen1()
    {
        $this->screen = 1;
    }

    public function screen2()
    {
        $this->screen = 2;
    }
    public function render()
    {
        return view('livewire.menu-edit');
    }
}
