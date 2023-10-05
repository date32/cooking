<div class="img10">
    <livewire:components.header />

    <div class="wi-90 ccenter3">
        <div class="tcenter f1-5">メニュー登録</div>
        <form wire:submit.prevent="menuStore">
            <div class="tcenter mt10">【メニュー名】</div>
            <div class="tcenter"><input class="wi-30 sp-80" type="text" wire:model="menu_name" required></div>
            @error('menu_name')
                <div class="c-red">{{ $message }}</div>
            @enderror

            <div class="mt10 tcenter">【画像】</div>
            <div class="tcenter"><input type="file" wire:model="menu_img"></div>

            <div class="mt10 tcenter">【材料】</div>
            <div class="tcenter">※複数選択出来ます</div>
            <div class="flex-wrap wi-50 ccenter3 mb30 sp-100 sp-grid3">
                @foreach ($materials as $material)
                    <div class="mr10 mt10">
                        <input type="checkbox" id="{{ $material->material_name }}" wire:model="material_name"
                            value="{{ $material->id }}">
                        <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                        <div><img class="ra10 wi1" src="{{ $material->material_img }}" alt=""></div>
                    </div>
                @endforeach
            </div>

            <div class="mt10 tcenter">材料がない時は材料を新規登録しましょう</div>
            <div class="tcenter">メニュー登録後に材料追加も出来ます</div>
            <div class="tcenter"><a href="/material/store" class="a">材料の登録</a></div>

            <div class="mt30">
                <button class="original-button ccenter3" type="submit">登録</button>
            </div>
        </form>
    </div>

    <livewire:components.link />

    <style>
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

        .img10::before {
            content: "";
            background-image: url(../img/img10.jpg);
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
