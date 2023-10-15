<div class="img5">
    <livewire:components.header />

    <div class="wi-90 ccenter3">
        <div class="tcenter f1-5">メニューの相談</div>
        @if ($screen == 1)
            <div class="mt10 tcenter">【最近のメニューを参考にする】</div>
            <div class="grid6 mb20 sp-grid3">
                @foreach ($dates as $date)
                    <div class="original-box-shadow mt10">

                        <div class="tcenter f1-5"><a
                                href="/menu/edit/{{ $date->menu->id }}">{{ $date->menu->menu_name }}</a>
                        </div>
                        <div class="mt10"><img class="ra10" src="{{ $date->menu->menu_img }}" alt=""></div>
                        <div class="tcenter mt10">{{ $date->date }}</div>
                        <div class="tcenter">{{ $date->timing->timing_name }}</div>

                        <div class="grid3 mt10 sp-f0-5">
                            <div class="">
                                <div class="tcenter">好き</div>
                                @foreach ($date->menu->likesAndDislikes as $likesAndDislike)
                                    @if ($likesAndDislike->evaluation_id == 1)
                                        <div class="tcenter">{{ $likesAndDislike->user->name }}</div>
                                    @endif
                                @endforeach
                            </div>
                            <div>
                                <div class="tcenter">普通</div>
                                @foreach ($date->menu->likesAndDislikes as $likesAndDislike)
                                    @if ($likesAndDislike->evaluation_id == 2)
                                        <div class="tcenter">{{ $likesAndDislike->user->name }}</div>
                                    @endif
                                @endforeach
                            </div>
                            <div>
                                <div class="tcenter">嫌い</div>
                                @foreach ($date->menu->likesAndDislikes as $likesAndDislike)
                                    @if ($likesAndDislike->evaluation_id == 3)
                                        <div class="tcenter">{{ $likesAndDislike->user->name }}</div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="bbd"></div>

            <div class="mt10 tcenter">【メニュー一覧から選ぶ】</div>
            <div class="grid6 mb30 sp-grid3">
                @foreach ($menus as $menu)
                    <div class="original-box-shadow mt10">
                        <div class="tcenter f1-5"><button class="a"
                                wire:click="choice({{ $menu->id }})">{{ $menu->menu_name }}</button></div>
                        <div class="mt10"><img class="ra10" src="{{ $menu->menu_img }}" alt=""></div>
                    </div>
                @endforeach
            </div>
            <div class="bbd"></div>

            <div class="mt10 tcenter">【今ある材料から選ぶ】</div>
            <form wire:submit.prevent="choiceMaterialsForMenu">
                <div class="grid8 mb20 sp-grid3">
                    @foreach ($materials as $material)
                        <div class="original-box-shadow mt10">
                            <input type="checkbox" wire:model="choiceMaterialsId" id="{{ $material->material_name }}"
                                value="{{ $material->id }}" name="1">
                            <label for="{{ $material->material_name }}">{{ $material->material_name }}</label>
                            <div class="mt10"><img class="ra10" src="{{ $material->material_img }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mb20"><button class="original-button ccenter3" type="submit">メニューを探す</button></div>
            </form>
            <div class="bbd"></div>
        @endif

        @if ($screen == 2 || $screen == 4)
            <div class="tcenter mt10"><span class="f1-5">【{{ $choiceMenu->menu_name }}】</span>を今日の</div>
            <form wire:submit.prevent="decision({{ $choiceMenu->id }})">
                <div class="tcenter mt10">
                    <select wire:model="decisionMenuTimingId">
                        <option value="">選択してください</option>
                        @foreach ($timings as $timing)
                            <option value="{{ $timing->id }}">{{ $timing->timing_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex ccenter2 mt10 mb30">
                    <div class="ccenter4">に、</div>
                    <div><button class="original-button" type="submit">決めた</button></div>
                </div>
            </form>
            @if ($screen == 2)
                <div class="tcenter"><a href="/help">戻る</a></div>
            @endif
            @if ($screen == 4)
                <div class="tcenter"><button class="a" wire:click="screen3">戻る</button></div>
            @endif

        @endif

        @if ($screen == 3)
            <div class="grid3 mt10 mb30">
                <div class="original-box-shadow2">
                    <div class="tcenter mb10 sp-f0-5">【選択した材料】</div>
                    @foreach ($choiceMaterials as $choiceMaterial)
                        <div class="tcenter">{{ $choiceMaterial }}</div>
                    @endforeach
                </div>

                <div class="original-box-shadow2">
                    <div class="tcenter sp-f0-5">【調理できるメニュー】</div>
                    <div class="grid3 mt10 sp-block">
                        @if ($trueMenu)
                            @foreach ($trueMenu as $trueMenuItem)
                                <div>
                                    <div class="tcenter"><button class="a f1-5"
                                            wire:click="choice({{ $trueMenuItem->id }})">{{ $trueMenuItem->menu_name }}</button>
                                    </div>
                                    <div><img class="ra10" src="{{ $trueMenuItem->menu_img }}" alt=""></div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="original-box-shadow2">
                    <div class="tcenter sp-f0-5">【足りない材料があるメニュー】</div>
                    <div class="grid3 mt10 sp-block">
                        @if ($falseMenu)
                            @foreach ($falseMenu as $falseMenuItem)
                                <div class="bbd">
                                    <div class="tcenter"><button class="a f1-5"
                                            wire:click="choice({{ $falseMenuItem->id }})">{{ $falseMenuItem->menu_name }}</button>
                                    </div>
                                    <div><img class="ra10" src="{{ $falseMenuItem->menu_img }}" alt=""></div>
                                    @foreach ($falseMenuItem->materialOfMenus as $materialOfMenusItem)
                                        @if (in_array($materialOfMenusItem->material->material_name, $choiceMaterials))
                                            <div class="true-color tcenter">
                                                {{ $materialOfMenusItem->material->material_name }}</div>
                                        @else
                                            <div class="false-color tcenter">
                                                {{ $materialOfMenusItem->material->material_name }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="tcenter"><a href="/help">戻る</a></div>
        @endif
    </div>

    <livewire:components.link />
    <style>
        .img5::before {
            content: "";
            background-image: url(../img/img5.jpg);
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

        .true-color {
            color: rgb(4, 255, 0);
        }

        .false-color {
            color: red;
        }
    </style>
</div>
