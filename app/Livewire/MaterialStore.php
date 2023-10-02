<?php

namespace App\Livewire;

use App\Models\Material;
use Livewire\Component;
use Livewire\WithFileUploads;

class MaterialStore extends Component
{
    use WithFileUploads;
    
    public $material_name;
    public $material_type;
    public $material_img;

    protected $rules = [
        'material_name' => 'required|unique:materials,material_name',
    ];
    protected $messages = [
        'material_name.unique' => 'この材料は登録されています',
    ];

    public function materialStore() {
        $validatedData = $this->validate();
        $material = new Material();
        $material->material_name = $this->material_name;
        $material->material_type = $this->material_type;
        if ($this->material_img != null) {

            // ディレクトリ名
            $dir = 'img';

            // ファイル名変更
            $file_name = $this->material_name . '.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $this->material_img->storeAs('public/' . $dir, $file_name);
            // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
            $material->material_img = '/storage' . '/' . $dir . '/' . $file_name;
        }
        $material->save();

        return redirect()->route('materialStore');
    }

    public function render()
    {
        return view('livewire.material-store');
    }
}
