<div class="img6">
    <livewire:components.header />
    <div class="wi-90 ccenter3">
        <div class="tcenter f1-5">材料登録</div>
        <form wire:submit.prevent="materialStore">
            <div class="tcenter mt10">【材料名】</div>
            <div class="tcenter"><input class="wi-30 sp-80" type="text" wire:model="material_name" required></div>

            <div class="tcenter mt10">【種類】</div>
            <div class="mt10 tcenter">
                <input type="radio" id="type1" wire:model="material_type" value="肉類" required name="1">
                <label class="mr10" for="type1">肉類</label>
                <input type="radio" id="type2" wire:model="material_type" value="魚介類" required name="1">
                <label class="mr10" for="type2">魚介類</label>
                <input type="radio" id="type3" wire:model="material_type" value="野菜" required name="1">
                <label class="mr10" for="type3">野菜</label>
                <input type="radio" id="type4" wire:model="material_type" value="果物" required name="1">
                <label class="mr10" for="type4">果物</label>
                <input type="radio" id="type5" wire:model="material_type" value="乳製品" required name="1">
                <label class="mr10" for="type5">乳製品</label>
                <input type="radio" id="type6" wire:model="material_type" value="麺類" required name="1">
                <label class="mr10" for="type6">麺類</label>
                <input type="radio" id="type7" wire:model="material_type" value="その他" required name="1">
                <label class="mr10" for="type7">その他</label>
            </div>

            @error('material_name')
                <div class="c-red">{{ $message }}</div>
            @enderror

            <div class="tcenter mt10">【画像】</div>
            <div class="tcenter mt10"><input type="file" wire:model="material_img"></div>

            @if ($material_img)
                <div>
                    <img class="mt10 ra10 ccenter3 wi2 sp-50"
                        src="{{ asset('storage/' . $material_img->store('images', 'public')) }}?{{ time() }}"
                        alt="アップロードされた画像">
                </div>
            @endif

            <div class="mt30"><button class="original-button ccenter3" type="submit">登録</button></div>
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

        .img6::before {
            content: "";
            background-image: url(../img/img6.jpg);
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
