<div class="img2">
    <livewire:components.header />

    <div class="wi-90 ccenter3">
        <form wire:submit.prevent="cookingStore">
            <div class="tcenter mt20 bbd">
                <div class="f1-5">調理日</div>
                <input class="mb10" type="date" wire:model="cookingDate" required>
            </div>

            <div class="mt10 tcenter">【メニューを選択してください】</div>
            <div class="grid6 bbd sp-grid3">
                @foreach ($menus as $menu)
                    <div class="mb30 original-box-shadow2">
                        <input type="radio" id="{{ $menu->menu_name }}" wire:model="menu" value="{{ $menu->id }}"
                            required name="1">
                        <label for="{{ $menu->menu_name }}">{{ $menu->menu_name }}</label>
                        <div><img class="ra10" src="{{ $menu->menu_img }}" alt=""></div>
                    </div>
                @endforeach
            </div>

            <div class="mt10 tcenter bbd">
                <div>【食事の種類】</div>
                @foreach ($timings as $timing)
                    <input type="radio" id="{{ $timing->timing_name }}" wire:model="timing"
                        value="{{ $timing->id }}" required name="2">
                    <label class="mr20" for="{{ $timing->timing_name }}">{{ $timing->timing_name }}</label>
                @endforeach
                <div class="mt10"></div>
            </div>

            <div class="mt20">
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

        .img2::before {
            content: "";
            background-image: url(../img/img2.jpg);
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
