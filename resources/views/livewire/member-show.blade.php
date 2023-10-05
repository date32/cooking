<div class="img8">
    <livewire:components.header />

    <div class="tcenter f1-5">Dの一族</div>
    <div class="grid3 wi-90 ccenter3 mb30 sp-block">
        @foreach ($members as $member)
            <div class="original-box-shadow mt10">
                <div class="tcenter f1-5"><a href="/member/edit/{{ $member->id }}">{{ $member->name }}</a></div>

                <div class="grid3">
                    <div>
                        <div>【好き】</div>
                        @foreach ($member->likesAndDislikes as $likesAndDislikes)
                            @if ($likesAndDislikes->evaluation_id == 1)
                                <div class="mt10">
                                    <div><a href="/menu/edit/{{$likesAndDislikes->menu->id}}">{{ $likesAndDislikes->menu->menu_name }}</a></div>
                                    <div><img class="ra10" src="{{ $likesAndDislikes->menu->menu_img }}" alt="">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <div>【普通】</div>
                        @foreach ($member->likesAndDislikes as $likesAndDislikes)
                            @if ($likesAndDislikes->evaluation_id == 2)
                                <div class="mt10">
                                    <div><a href="/menu/edit/{{$likesAndDislikes->menu->id}}">{{ $likesAndDislikes->menu->menu_name }}</a></div>
                                    <div><img class="ra10" src="{{ $likesAndDislikes->menu->menu_img }}" alt=""></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <div>【嫌い】</div>
                        @foreach ($member->likesAndDislikes as $likesAndDislikes)
                            @if ($likesAndDislikes->evaluation_id == 3)
                                <div class="mt10">
                                    <div><a href="/menu/edit/{{$likesAndDislikes->menu->id}}">{{ $likesAndDislikes->menu->menu_name }}</a></div>
                                    <div><img class="ra10" src="{{ $likesAndDislikes->menu->menu_img }}" alt=""></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
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
        .img8::before {
            content: "";
            background-image: url(../img/img8.jpg);
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
