<div class="img12">
    <livewire:components.header />

    <div class="tcenter f1-5">メニュー詳細</div>
    <div class="wi-90 ccenter3">
        @if ($screen == 1)
            <div class="tcenter f1-5 mt10">【{{ $menuDetail->menu_name }}】</div>
            <div><img class="ra10 wi-30 ccenter3 mt10" src="{{ $menuDetail->menu_img }}" alt=""></div>

            <div class="tcenter mt30">【材料】</div>

            <div class="grid6 sp-grid3">
                @foreach ($materials->materialOfMenus as $item)
                    <div class="original-box-shadow mt10">
                        <div>{{ $item->material->material_name }}</div>
                        <div><img class="ra10" src="{{ $item->material->material_img }}" alt=""></div>
                        <div><button wire:click="materialDelete({{ $item->material->id }})" class="a">削除</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt30 wi-50 ccenter3 sp-100 grid3">
                <div>
                    <div class="tcenter">【好き】</div>
                    @foreach ($menuDetail->likesAndDislikes as $likesAndDislikes)
                        @if ($likesAndDislikes->evaluation_id == 1)
                            <div class="tcenter">{{ $likesAndDislikes->user->name }}</div>
                        @endif
                    @endforeach
                </div>

                <div>
                    <div class="tcenter">【普通】</div>
                    @foreach ($menuDetail->likesAndDislikes as $likesAndDislikes)
                        @if ($likesAndDislikes->evaluation_id == 2)
                            <div class="tcenter">{{ $likesAndDislikes->user->name }}</div>
                        @endif
                    @endforeach
                </div>

                <div>
                    <div class="tcenter">【嫌い】</div>
                    @foreach ($menuDetail->likesAndDislikes as $likesAndDislikes)
                        @if ($likesAndDislikes->evaluation_id == 3)
                            <div class="tcenter">{{ $likesAndDislikes->user->name }}</div>
                        @endif
                    @endforeach
                </div>

            </div>

            <div class="mt30"><button class="original-button ccenter3" wire:click="screen2">このメニューを削除</button>
            </div>

            <div class="bbd mt30"></div>

            <form wire:submit.prevent="menuUpdate">
                <div class="tcenter mt30">【メニュー名変更】</div>
                <div class="tcenter mt10"><input type="text" wire:model="menu_name"></div>
                @error('menu_name')
                    <div class="c-red">{{ $message }}</div>
                @enderror

                <div class="tcenter mt10"><input type="file" wire:model="menu_img"></div>
                @if ($menu_img)
                    <div>
                        <img class="mt10 ra10 ccenter3 wi2 sp-50"
                            src="{{ asset('storage/' . $menu_img->store('images', 'public')) }}?{{ time() }}"
                            alt="アップロードされた画像">
                    </div>
                @endif

                <div class="tcenter mt30">【材料変更】</div>
                <div class="tcenter">複数選択出来ます</div>


                <div class="original-box-shadow2 mt10">
                    <div>肉類</div>
                    <div class="grid7 sp-grid4">
                        @foreach ($allMaterials as $material)
                            @if ($material->material_type == '肉類')
                                <div>
                                    <input type="checkbox" id="{{ $material->material_name }}"
                                        wire:model="materialsUpdate" value="{{ $material->id }}" checked>
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
                        @foreach ($allMaterials as $material)
                            @if ($material->material_type == '魚介類')
                                <div>
                                    <input type="checkbox" id="{{ $material->material_name }}"
                                        wire:model="materialsUpdate" value="{{ $material->id }}" checked>
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
                        @foreach ($allMaterials as $material)
                            @if ($material->material_type == '野菜')
                                <div>
                                    <input type="checkbox" id="{{ $material->material_name }}"
                                        wire:model="materialsUpdate" value="{{ $material->id }}" checked>
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
                        @foreach ($allMaterials as $material)
                            @if ($material->material_type == '果物')
                                <div>
                                    <input type="checkbox" id="{{ $material->material_name }}"
                                        wire:model="materialsUpdate" value="{{ $material->id }}" checked>
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
                        @foreach ($allMaterials as $material)
                            @if ($material->material_type == '乳製品')
                                <div>
                                    <input type="checkbox" id="{{ $material->material_name }}"
                                        wire:model="materialsUpdate" value="{{ $material->id }}" checked>
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
                        @foreach ($allMaterials as $material)
                            @if ($material->material_type == '麺類')
                                <div>
                                    <input type="checkbox" id="{{ $material->material_name }}"
                                        wire:model="materialsUpdate" value="{{ $material->id }}" checked>
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
                        @foreach ($allMaterials as $material)
                            @if ($material->material_type == 'その他')
                                <div>
                                    <input type="checkbox" id="{{ $material->material_name }}"
                                        wire:model="materialsUpdate" value="{{ $material->id }}" checked>
                                    <label
                                        for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                                    <div><img class="ra10" src="{{ $material->material_img }}" alt="">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>




                <div class="tcenter">材料がない時は材料を新規登録しましょう</div>
                <div class="tcenter"><a href="/material/store">材料の登録</a></div>
                <div class="mt30">
                    <button class="original-button ccenter3" type="submit">登録</button>
                </div>
            </form>

        @endif
    </div>


    <div class="wi-90 ccenter3">
        @if ($screen == 2)
            <div>本当に【{{ $menuDetail->menu_name }}】を削除しますか？</div>
            <div><button wire:click="menuDelete">はい</button></div>
            <div><button wire:click="screen1">いいえ</button></div>
        @endif
    </div>


    <livewire:components.Link />

    <style>
        /* .img12::before {
            content: "";
            background-image: url(../img/img12.jpg);
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
