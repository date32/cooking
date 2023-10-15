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
            @if ($menu_img)
                <div>
                    <img class="mt10 ra10 ccenter3 wi2 sp-50"
                        src="{{ asset('storage/' . $menu_img->store('images', 'public')) }}?{{ time() }}"
                        alt="アップロードされた画像">
                </div>
            @endif

            <div class="mt10 tcenter">【材料】</div>
            <div class="tcenter">※複数選択出来ます</div>


            <div class="original-box-shadow2 mt10">
                <div>肉類</div>
                <div class="grid7 sp-grid4">
                    @foreach ($materials as $material)
                        @if ($material->material_type == '肉類')
                            <div>
                                <input type="checkbox" id="{{ $material->material_name }}" wire:model="material_name"
                                    value="{{ $material->id }}">
                                <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                                <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div>魚介類</div>
                <div class="grid7 sp-grid4">
                    @foreach ($materials as $material)
                        @if ($material->material_type == '魚介類')
                            <div>
                                <input type="checkbox" id="{{ $material->material_name }}" wire:model="material_name"
                                    value="{{ $material->id }}">
                                <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                                <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div>野菜</div>
                <div class="grid7 sp-grid4">
                    @foreach ($materials as $material)
                        @if ($material->material_type == '野菜')
                            <div>
                                <input type="checkbox" id="{{ $material->material_name }}" wire:model="material_name"
                                    value="{{ $material->id }}">
                                <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                                <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div>果物</div>
                <div class="grid7 sp-grid4">
                    @foreach ($materials as $material)
                        @if ($material->material_type == '果物')
                            <div>
                                <input type="checkbox" id="{{ $material->material_name }}" wire:model="material_name"
                                    value="{{ $material->id }}">
                                <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                                <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div>乳製品</div>
                <div class="grid7 sp-grid4">
                    @foreach ($materials as $material)
                        @if ($material->material_type == '乳製品')
                            <div>
                                <input type="checkbox" id="{{ $material->material_name }}" wire:model="material_name"
                                    value="{{ $material->id }}">
                                <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                                <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div>麺類</div>
                <div class="grid7 sp-grid4">
                    @foreach ($materials as $material)
                        @if ($material->material_type == '麺類')
                            <div>
                                <input type="checkbox" id="{{ $material->material_name }}" wire:model="material_name"
                                    value="{{ $material->id }}">
                                <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                                <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div>その他</div>
                <div class="grid7 sp-grid4">
                    @foreach ($materials as $material)
                        @if ($material->material_type == 'その他')
                            <div>
                                <input type="checkbox" id="{{ $material->material_name }}" wire:model="material_name"
                                    value="{{ $material->id }}">
                                <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                                <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                            </div>
                        @endif
                    @endforeach
                </div>
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
