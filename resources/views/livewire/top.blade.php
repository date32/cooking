<div class="img1">
    <livewire:components.header />
    <livewire:components.Link />

    <style>
        .img1::before {
            content: "";
            background-image: url(../img/img1.jpg);
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
