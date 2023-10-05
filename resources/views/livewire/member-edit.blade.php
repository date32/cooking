<div class="img9 bgc">
    <livewire:components.header />

    <div class="wi-90 ccenter3">
        <div class="tcenter mt10"><span class="f1-5">{{ $member->name }}</span>のページ</div>

        <div class="grid3">
            <div class="original-box-shadow2">
                <div class="f1-5 tcenter">【好き】</div>
                <div class="grid3">
                    @foreach ($member->likesAndDislikes as $likesAndDislikes)
                        @if ($likesAndDislikes->evaluation_id == 1)
                            <div>
                                <div><a href="/menu/edit/{{$likesAndDislikes->menu->id}}">{{ $likesAndDislikes->menu->menu_name }}</a></div>
                                <div><img class="ra10" src="{{ $likesAndDislikes->menu->menu_img }}" alt="">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="original-box-shadow2">
                <div class="f1-5 tcenter">【普通】</div>
                <div class="grid3">
                    @foreach ($member->likesAndDislikes as $likesAndDislikes)
                        @if ($likesAndDislikes->evaluation_id == 2)
                            <div>
                                <div><a href="/menu/edit/{{$likesAndDislikes->menu->id}}">{{ $likesAndDislikes->menu->menu_name }}</a></div>
                                <div><img class="ra10" src="{{ $likesAndDislikes->menu->menu_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="original-box-shadow2">
                <div class="f1-5 tcenter">【嫌い】</div>
                <div class="grid3">
                    @foreach ($member->likesAndDislikes as $likesAndDislikes)
                        @if ($likesAndDislikes->evaluation_id == 3)
                            <div>
                                <div><a href="/menu/edit/{{$likesAndDislikes->menu->id}}">{{ $likesAndDislikes->menu->menu_name }}</a></div>
                                <div><img class="ra10" src="{{ $likesAndDislikes->menu->menu_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <form wire:submit.prevent="likeDislikeStore">
            <div class="mt30 tcenter">【好き嫌いの登録】</div>
            <div class="grid8 mt10">
                @foreach ($menus as $menu)
                <div class="original-box-shadow2">
                    <input type="checkbox" id="{{ $menu->menu_name }}" value="{{ $menu->id }}" wire:model="menus_id">
                    <label for="{{ $menu->menu_name }}">{{ $menu->menu_name }}</label>
                    <div class="mt10"><img class="ra10" src="{{ $menu->menu_img }}" alt=""></div>
                </div>  
                @endforeach
            </div>

            <div class="tcenter mt30">チェックしたメニューは</div>
            <div class="tcenter">
                <select wire:model="evaluation" required>
                    <option value="">選択してください</option>
                    @foreach ($evaluations as $evaluation)
                        <option value="{{ $evaluation->id }}">{{ $evaluation->evaluation }}</option>
                    @endforeach
                </select>
            </div>
            <div class="tcenter">です</div>

            <div class="mt30"><button class="original-button ccenter3" type="submit">登録</button></div>
        </form>
    </div>


    <livewire:components.link />
    <style>
        /* .img9::before {
            content: "";
            background-image: url(../img/img9.jpg);
            background-size: cover;
            background-position: center center;
            position: fixed;
            top: 0;
            left: 50%;
            width: 100%;
            height: 100vh;
            z-index: -1;
            opacity: 0.5;
            transform: translate(-50%, 0);
        } */

        .original-box-shadow2 {
            color: #333333;
            background-color: #dddddd72;
            padding: 10px;
            border-radius: 3px;
            box-shadow: 6px 6px 10px 0px rgba(0, 0, 0, 0.4);
        }
        .original-button {
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            text-decoration: none;
            color: #333333;
            font-size: 18px;
            border-radius: 0px;
            width: 200px;
            height: 40px;
            font-weight: bold;
            border: 2px solid #333333;
            transition: 0.3s;
            box-shadow: 5px 5px 0px 0px rgba(51, 51, 51, 1);
            background-color: #c1ff82;
        }

        .original-button:hover {
            box-shadow: 0 0 #333;
            color: #fff;
            background-color: #333;
        }
    </style>
</div>
