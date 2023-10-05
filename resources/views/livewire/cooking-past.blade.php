<div class="img4">
    <livewire:components.header />

    <div class="wi-90 ccenter3 mb30 sp-mb100">
        <div class="tcenter f1-5">{{ $yearMonth }}月　調理一覧</div>
        <div class="grid6 mt10 sp-grid3">
            @foreach ($dates as $date)
                <div class="original-box-shadow">
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
        /* 
        Route::get('/show/{id}', CookingPast::class)->name('cookingPast');
        このようにルートを分岐させるとこのファイルでbackground-imageが効かないかもしれない
        「style.css」のファイルに下のコードを記述すると反映する
        他のbaldeファイルは下のように各ファイルに記述すれば反映する
        */
        /* .img4::before {
            content: "";
            background-image: url(../img/img4.jpg);
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
    </style>
</div>
