<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\MaterialOfMenu;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class MenuStore extends Component
{
    use WithFileUploads;
    
    public $menu_name; //フォームのメニュー名
    public $menu_img; //フォームのメニュー画像
    public $materials; //DBの材料を取得
    public $material_name = []; //フォームの材料名

    protected $rules = [
        'menu_name' => 'required|unique:menus,menu_name',
    ];
    protected $messages = [
        'menu_name.unique' => 'このメニューは登録されています'
    ];

    public function mount() {
        $this->materials = Material::get();
    }

    public function menuStore() {
        $validatedData = $this->validate();
        $menu = new Menu();
        $menu->menu_name = $this->menu_name;
        if ($this->menu_img != null) {

            // ディレクトリ名
            $dir = 'img';

            // ファイル名変更
            $file_name = $this->menu_name . '.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $this->menu_img->storeAs('public/' . $dir, $file_name);
            // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
            $menu->menu_img = '/storage' . '/' . $dir . '/' . $file_name;
        }
        $menu->save();

        $newMenu = Menu::latest()->first();

        foreach($this->material_name as $item) { //1つのメニューに対して材料が複数の場合はforeachで１つずつ保存
            $mate_menu = new MaterialOfMenu();
            $mate_menu->menu_id = $newMenu->id;
            $mate_menu->material_id = $item;
            $mate_menu->save();
        }
        
        return redirect()->route('menuStore');
    }

    public function render()
    {
        return view('livewire.menu-store');
    }
}
