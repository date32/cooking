<?php

namespace App\Livewire;

use App\Models\Material;
use Livewire\Component;
use Livewire\WithFileUploads;

class MaterialEdit extends Component
{
    use WithFileUploads;

    public $material;
    public $material_name;
    public $material_type;
    public $material_img;
    public $screen = 1;

    protected $rules = [
        'material_name' => 'unique:materials,material_name',
    ];
    protected $messages = [
        'material_name.unique' => 'この材料は登録されています',
    ];

    public function mount(string $id)
    {
        $this->material = Material::find($id);
    }

    public function materialUpdate()
    {
        $validatedData = $this->validate();
        $materialUpdate = Material::find($this->material->id);
        if ($this->material_name != null) {
            $materialUpdate->material_name = $this->material_name;
        }
        if ($this->material_type != null) {
            $materialUpdate->material_type = $this->material_type;
        }
        if ($this->material_img != null) {
            // 画像と材料名を変更する時
            if ($this->material_name != null) {
                // ディレクトリ名
                $dir = 'img';
                // ファイル名変更
                $file_name = $this->material_name . '.jpg';
                // ファイルを保存　storageというフォルダに保存される
                $this->material_img->storeAs('public/' . $dir, $file_name);
                // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
                $materialUpdate->material_img = '/storage' . '/' . $dir . '/' . $file_name;
            }
            // 画像のみ変更する時（画像のファイル名を上書きまたは新規保存する）
            if ($this->material_name == null) {
                // 材料名を取得
                $name = $materialUpdate->material_name;
                // ディレクトリ名
                $dir = 'img';
                // ファイル名変更
                $file_name = $name . '.jpg';
                // ファイルを保存　storageというフォルダに保存される
                $this->material_img->storeAs('public/' . $dir, $file_name);
                // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
                $materialUpdate->material_img = '/storage' . '/' . $dir . '/' . $file_name;
            }
        }
        $materialUpdate->save();

        return redirect()->route('materialShow');
    }
    public function materialDelete()
    {
        $materialDelete = Material::find($this->material->id);
        $materialDelete->delete();

        return redirect()->route('materialShow');
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
        return view('livewire.material-edit');
    }
}
