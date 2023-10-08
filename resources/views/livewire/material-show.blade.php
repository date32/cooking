<div class="img7">
    <livewire:components.header />
    <div class="tcenter f1-5">材料一覧</div>

    <div class="wi-90 ccenter3 mb50">
        <div class="grid4 mt10 sp-block">
            <div class="original-box-shadow2 mt10">
                <div class="tcenter f1-5">肉類</div>
                <div class="grid2">
                    @foreach ($meatMate as $material)
                        <div>
                            <div><a href="/material/edit/{{ $material->id }}">{{ $material->material_name }}</a></div>
                            <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="original-box-shadow2 mt10">
                <div class="tcenter f1-5">魚介類</div>
                <div class="grid2">
                    @foreach ($fishMate as $material)
                        <div>
                            <div><a href="/material/edit/{{ $material->id }}">{{ $material->material_name }}</a></div>
                            <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div class="tcenter f1-5">野菜</div>
                <div class="grid2">
                    @foreach ($vegeMate as $material)
                        <div>
                            <div><a href="/material/edit/{{ $material->id }}">{{ $material->material_name }}</a></div>
                            <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div class="tcenter f1-5">果物</div>
                <div class="grid2">
                    @foreach ($fruitMate as $material)
                        <div>
                            <div><a href="/material/edit/{{ $material->id }}">{{ $material->material_name }}</a></div>
                            <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div class="tcenter f1-5">乳製品</div>
                <div class="grid2">
                    @foreach ($dairyMate as $material)
                        <div>
                            <div><a href="/material/edit/{{ $material->id }}">{{ $material->material_name }}</a></div>
                            <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div class="tcenter f1-5">麺類</div>
                <div class="grid2">
                    <div>
                        @foreach ($noodleMate as $material)
                            <div><a href="/material/edit/{{ $material->id }}">{{ $material->material_name }}</a></div>
                            <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="original-box-shadow2 mt10">
                <div class="tcenter f1-5">その他</div>
                <div class="grid2">
                    @foreach ($otherMate as $material)
                        <div>
                            <div><a href="/material/edit/{{ $material->id }}">{{ $material->material_name }}</a></div>
                            <div><img class="ra10" src="{{ $material->material_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <livewire:components.Link />

    <style>
        .original-box-shadow2 {
            color: #333333;
            background-color: #dddddd72;
            padding: 10px;
            border-radius: 3px;
            box-shadow: 6px 6px 10px 0px rgba(0, 0, 0, 0.4);
        }
        .img7::before {
            content: "";
            background-image: url(../img/img7.jpg);
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
