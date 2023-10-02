<?php

namespace App\Livewire;

use App\Models\Evaluation;
use App\Models\LikesAndDislike;
use App\Models\Menu;
use App\Models\User;
use Livewire\Component;

class MemberEdit extends Component
{
    public $member; //エディットするメンバー
    public $menus; //DBのメニュー取得
    public $evaluations; //DBの好き嫌い取得
    public $menus_id = []; //フォームのメニューidの配列
    public $evaluation; //フォームの好き嫌いのid

    public function mount(string $id) {
        // $this->member = User::find($id);
        $this->member = User::with(['likesAndDislikes.evaluation', 'likesAndDislikes.menu'])->find($id);
        $this->menus = Menu::get();
        $this->evaluations = Evaluation::get();
    }

    public function likeDislikeStore() {
        foreach($this->menus_id as $menu_id) { //選択したメニューを１つずつ登録する

            //エディットするメンバーの好き嫌い情報取得
            $datas = LikesAndDislike::where('user_id', $this->member->id)->get();

            //エディットするメンバーの好き嫌い情報取得がこのメニューに対して存在するかどうか
            foreach($datas as $data) {
                if($data->menu_id == $menu_id) { //存在すれば一旦削除
                    $data->delete();
                }
            }
            
            //新規登録する
            $likeDislike = new LikesAndDislike();
            $likeDislike->user_id = $this->member->id;
            $likeDislike->menu_id = $menu_id;
            $likeDislike->evaluation_id = $this->evaluation;
            $likeDislike->save();
        }
        return redirect('/member/edit/' . $this->member->id);
        
    }
    public function render()
    {
        return view('livewire.member-edit');
    }
}
