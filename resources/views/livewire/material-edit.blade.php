<div class="img9">
    <livewire:components.header />

    <div class="wi-90 ccenter3">
        <div class="tcenter f1-5">材料編集</div>
        @if ($screen == 1)
            <div class="tcenter mt10">{{ $material->material_name }}</div>
            <div class="tcenter">{{ $material->material_type }}</div>
            <div><img class="ra10 ccenter3 wi2" src="{{ $material->material_img }}" alt=""></div>
            <form wire:submit.prevent="materialUpdate">
                <div class="mt10 tcenter">【材料名変更】</div>
                <div class="tcenter"><input class="wi-30" type="text" wire:model="material_name"></div>

                @error('material_name')
                    <div class="c-red">{{ $message }}</div>
                @enderror

                <div class="mt10 tcenter">
                    <div class="tcenter mt10">【種類変更】</div>
                    <input type="radio" id="type1" wire:model="material_type" value="肉類" name="1">
                    <label class="mr10" for="type1">肉類</label>
                    <input type="radio" id="type2" wire:model="material_type" value="魚介類" name="1">
                    <label class="mr10" for="type2">魚介類</label>
                    <input type="radio" id="type3" wire:model="material_type" value="野菜" name="1">
                    <label class="mr10" for="type3">野菜</label>
                    <input type="radio" id="type4" wire:model="material_type" value="果物" name="1">
                    <label class="mr10" for="type4">果物</label>
                    <input type="radio" id="type5" wire:model="material_type" value="乳製品" name="1">
                    <label class="mr10" for="type5">乳製品</label>
                    <input type="radio" id="type6" wire:model="material_type" value="麺類" name="1">
                    <label class="mr10" for="type6">麺類</label>
                    <input type="radio" id="type7" wire:model="material_type" value="その他" name="1">
                    <label class="mr10" for="type7">その他</label>
                </div>

                <div class="tcenter mt10">【画像変更】</div>
                <div class="tcenter mt10"><input type="file" wire:model="material_img"></div>

                @if ($material_img)
                    <div class="">
                        <img class="mt10 ra10 ccenter3 wi-50 sp-80"
                            src="{{ asset('storage/' . $material_img->store('images', 'public')) }}?{{ time() }}"
                            alt="アップロードされた画像">
                    </div>
                @endif

                <div class="mt30"><button class="original-button ccenter3" type="submit">変更</button></div>
            </form>
            <div class="mt30"><button class="original-button ccenter3" wire:click="screen2">この材料を削除</button></div>
        @endif
        @if ($screen == 2)
            <div>本当に【{{ $material->material_name }}】を削除しますか？</div>
            <div><button wire:click="materialDelete">はい</button></div>
            <div><button wire:click="screen1">いいえ</button></div>
        @endif
    </div>

    <livewire:components.Link />

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
    </style>
</div>
