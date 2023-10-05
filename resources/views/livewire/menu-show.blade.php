<div class="img11">
    <livewire:components.header />
    <div class="tcenter f1-5">メニュー一覧</div>

<div class="wi-90 ccenter3 mb50">
    <div class="grid4 sp-grid2">
        @foreach ($menus as $menu)
            <div class="original-box-shadow2 mt10">
                <div class="tcenter f1-5"><a href="/menu/edit/{{ $menu->id }}">{{ $menu->menu_name }}</a></div>
                <div class="mt10"><img class="ra10 ccenter3" src="{{ $menu->menu_img }}" alt=""></div>
                <div class="grid3 mt10 sp-f0-5">
                    <div>
                        <div class="tcenter">好き</div>
                        @foreach ($menu->likesAndDislikes as $likesAndDislikes)
                            @if ($likesAndDislikes->evaluation_id == 1)
                                <div class="tcenter">{{ $likesAndDislikes->user->name }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <div class="tcenter">普通</div>
                        @foreach ($menu->likesAndDislikes as $likesAndDislikes)
                            @if ($likesAndDislikes->evaluation_id == 2)
                                <div class="tcenter">{{ $likesAndDislikes->user->name }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <div class="tcenter">嫌い</div>
                        @foreach ($menu->likesAndDislikes as $likesAndDislikes)
                            @if ($likesAndDislikes->evaluation_id == 3)
                                <div class="tcenter">{{ $likesAndDislikes->user->name }}</div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
  
    <livewire:components.Link />
    <style>
         .original-box-shadow {
            color: #333333;
            background-color: #dddddd;
            padding: 10px;
            border-radius: 3px;
            box-shadow: 6px 6px 10px 0px rgba(0, 0, 0, 0.4);
        }
        .original-box-shadow2 {
            color: #333333;
            background-color: #dddddd72;
            padding: 10px;
            border-radius: 3px;
            box-shadow: 6px 6px 10px 0px rgba(0, 0, 0, 0.4);
        }
        .img11::before {
            content: "";
            background-image: url(../img/img11.jpg);
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
        }
    </style>
</div>
