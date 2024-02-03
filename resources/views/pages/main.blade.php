@extends("layouts.main")

@push("css")
<link href="/css/skeleton/products.css" rel="stylesheet">
<link href="/css/white-theme/products.css" rel="stylesheet">

<link href="/css/skeleton/main.css" rel="stylesheet">
<link href="/css/white-theme/main.css" rel="stylesheet">

<link href="/css/skeleton/plain-request-form.css" rel="stylesheet">
<link href="/css/white-theme/plain-request-form.css" rel="stylesheet">

<link href="/css/white-theme/main.css" rel="stylesheet">

<link href="/css/skeleton/landing.css" rel="stylesheet">
<link href="/css/white-theme/landing.css" rel="stylesheet">
@endpush

@push("js")
<script src="/js/products.js"></script>
<script src="/js/form-handler.js"></script>
@endpush

@section("main-slider")
<!--<div class="first-screen-background" style="background-image:url('/images/coal-2.webp')"><div class="dimming"></div></div>-->

<div class="slider-1 slider">
    <div class="slider-item-wrapper" style="background-image:url('/images/slider/coal-2.webp')">
        <div class="dimming">
            <div class="slider-item">
                <div class="slider-description">
                    <div class="wrapper">
                        <h1 class="header-text">Уголь в новосибирске</h1>
                        <span style="font-size: 24px">От 1 тонны и выше</span>
                    </div>
                </div>

                <div class="request">
                    <span class="form-title">Оставьте завявку и мы перезвоним</span>

                    <div class="row">
                        <form action="/api/call-request" method="POST" class="request-form form">
                            <div class="result" style="display:none"><span class="message"></span></div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="input-list">
                                <input type="text" name="name" placeholder="Имя" required>
                                <input type="tel" name="phone" placeholder="Телефон" required>
                                <input type="email" name="email" placeholder="Эл. почта" required>

                                <div data-display-none class="response">Ваша заявка принята</div>
                            </div>

                            <div class="submit-wrapper">
                                <x-button type="submit">Отправить</x-button>
                            </div>
                        </form>

                        <!--<div class="schedule">
                            <div>Пн.-Пт.</div>
                            <div>8:00-20:00</div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="first-screen-bottom-content"></div>-->
@endsection

@section("content")
<h2>Фото продукции</h2>

<div class="gallery gallery-1">
    <div class="column primary">
        <div class="a img" style="background: url('/images/gallery/a-500.jpg')"></div>
    </div>

    <div class="column middle">
        <div class="e img" style="background: url('/images/gallery/e-500.jpg')"></div>
        <div class="f img" style="background: url('/images/gallery/f-500.jpg')"></div>
    </div>

    <div class="column secondary">
        <div class="top"><div class="b img" style="background: url('/images/gallery/b-500.jpg')"></div></div>
        <div class="bottom"><div class="c img" style="background: url('/images/gallery/c-250.jpg')"></div><div class="d img" style="background: url('/images/gallery/d-250.jpg')"></div></div>
    </div>
</div>

@if ($products)
<h2>Эти и другие товары уже ждут вас</h2>

<div class="products">
    @each("partials/product", $products, "product")
</div>
@endif

@if ($products)
<h2>Популярные категории</h2>

<div class="products">
    @each("partials/product", $products, "product")
</div>
@endif

@if ($products)
<h2>Обзор популярных товаров</h2>

<div class="products">
    @each("partials/product", $products, "product")
</div>
@endif

<!--
<h2>Калькулятор стоимости</h2>

<div class="calculator">
    <div class="background" style="background: url('/images/calculator.png')"></div>
</div>
-->

@endsection("content")

