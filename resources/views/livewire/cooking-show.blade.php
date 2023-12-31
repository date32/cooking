<div class="img3">
    <livewire:components.header />

    <div class="wi-90 ccenter3">
        <div class="tcenter f1-5 mt10">今月のメニュー一覧</div>
        <div class="grid6 mt10 mb10 sp-grid3">
            @foreach ($dates as $date)
                <div class="original-box-shadow mt10">
                    <div>{{ $date->date }}</div>
                    <div><a href="/menu/edit/{{ $date->menu->id }}">{{ $date->menu->menu_name }}</a></div>
                    <div><img class="ra10" src="{{ $date->menu->menu_img }}" alt=""></div>
                    <div>{{ $date->timing->timing_name }}</div>
                    <div><button class="c-red b-hover2" wire:click="dateDelete({{ $date->id }})">削除</button></div>
                </div>
            @endforeach
        </div>
    </div>

    <livewire:components.link />

    <style>
        .original-box-shadow {
            color: #333333;
            background-color: #dddddd;
            padding: 10px;
            border-radius: 3px;
            box-shadow: 6px 6px 10px 0px rgba(0, 0, 0, 0.4);
        }
        .img3::before {
            content: "";
            background-image: url(../img/img3.jpg);
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
