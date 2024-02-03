<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Уголь</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link href="{{ asset('/fontawesome/css/all.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/skeleton.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/white-theme.css') }}" rel="stylesheet">

        <script>const csrf = "{{ csrf_token() }}";</script>

        @stack("css")
        <link rel="preload" as="script" href="{{ asset('/js/functions.js') }}">
        <link rel="preload" as="script" href="{{ asset('/js/bundle.js') }}">
    </head>

    <body>
        <div class="wrapper">
            <div class="top">
                <header>
                    <div class="container">
                        <div class="wrapper">
                            <div class="row general">
                                <div class="row">
                                    <span class="dark-mode">
                                        <span class="icon dark-mode-icon" style="margin-left:0"><i style="font-size:16px" class="fa-solid fa-bars"></i></span>
                                    </span>

                                    <a href="/" class="logo-link"><img src="/images/logo/logo.webp" class="logo" alt="logo"></a>
                                    <span class="description">Достаквка угля и древесины</span>
                                </div>

                                <div class="row">
                                    <span class="dark-mode cost">
                                        <span><span data-js="price"><span style="font-size: 14px">&#8381;</span>&nbsp;{{ number_format($price, 0, ".", " ") }}</span></span>
                                        <a href="/basket" class="icon dark-mode-icon"><i class="fa-solid fa-basket-shopping"></i></a>
                                    </span>

                                    <span class="schedule">Пн.-Пт.</span>

                                    <span class="whatsapp">
                                        <a href="tel:89963900000" class="whatsapp-icon contact-icon icon"><i class="fa-brands fa-whatsapp"></i></a>
                                    </span>

                                    <span class="telegram">
                                        <a href="tel:89963900000" class="telegram-icon contact-icon icon"><i class="fa-brands fa-telegram"></i></i></a>
                                    </span>

                                    <span class="phone">
                                        <!--<a href="tel:89963900000" class="phone-icon icon"><i class="fa-solid fa-phone"></i></a>-->
                                        <a href="tel:89963900000" class="phone-number">8 (996) 390-00-00</a>
                                    </span>

                                    <button class="order-call">Заказать звонок</button>

                                    <span class="dark-mode">
                                        <button class="icon dark-mode-icon"><i class="fa-solid fa-moon"></i></button>
                                    </span>
                                </div>
                            </div>

                            <div class="row main-menu">
                                <div class="link-list">
                                    @foreach ($menu as $menuItem)
                                    @if ($menuItem['position'] === 'main-left')
                                    <div class="item"><a class="link" href="{{ $menuItem['link'] }}"><span class="link-text">{{ $menuItem['name'] }}</span></a></div>
                                    @endif
                                    @endforeach
                                </div>

                                <div class="link-list">
                                    @foreach ($menu as $menuItem)
                                    @if ($menuItem['position'] === 'main-right')
                                    <div class="item"><a class="link" href="{{ $menuItem['link'] }}"><span class="link-text">{{ $menuItem['name'] }}</span></a></div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                @if (empty($hideSubmenu) || !$hideSubmenu)
                <nav class="row submenu">
                    <ul class="list">
                        <!--<li class="item"><a class="link catalog" href="{{ $submenu['catalog']['link'] }}"><i class="fa-solid fa-list-ul"></i> {{ $submenu['catalog']['name'] }}</a></li>-->
                        @foreach ($submenu['categories'] as $category)
                        <li class="item"><a class="link" href="/catalog/{{ $category['link'] }}">{{ $category['name'] }}</a></li>
                        @endforeach
                        <li class="item"><a class="link" href="/catalog">Все категории</a></li>
                    </ul>
                </nav>
                @endif

                @yield("breadcrumbs")

                @yield("main-slider")

                <div class="content">
                @yield("content", "Скоро здесь будет контент")
                </div>

                <span class="image-source">Изображения взяты с сайта <a style="color: hsla(200, 100%, 35%, 1); text-decoration: none" href="https://www.freepik.com/">Freepick</a></span>
            </div>

            <footer>
                <div class="column">
                    <div class="title">Каталог</div>
                    <ul class="items">
                        @foreach ($submenu['categories'] as $category)
                        <li class="item"><a class="link" href="/catalog/{{ $category['link'] }}">{{ $category['name'] }}</a></li>
                        @endforeach
                        <li class="item"><a class="link" href="/catalog">Все категории</a></li>
                    </ul>
                </div>

                <div class="column">
                    <div class="title">О нас</div>
                    <ul class="items">
                        <li class="item"><a class="link" href="#">Отзывы</a></li>
                        <li class="item"><a class="link" href="#">Где находимся</a></li>
                        <li class="item"><a class="link" href="#">Куда доставляем</a></li>
                        <li class="item"><a class="link" href="#">Деловое предложение</a></li>
                    </ul>
                </div>

                <div class="column">
                    <div class="title">О сайте</div>
                    <ul class="items">
                        <li class="item"><a class="link" href="#">Заказть разработку</a></li>
                        <li class="item"><a class="link" href="#">Деловое предложение</a></li>
                        <li class="item"><a class="link" href="#">Лицензионное соглашение</a></li>
                    </ul>
                </div>

                <div class="column">
                    <div class="title">Контакты</div>
                    <ul class="items">
                        <li class="item"><a class="link" href="#">8 (996) 390-00-00</a></li>
                        <li class="item"><a class="link" href="#">Whatsapp</a></li>
                        <li class="item"><a class="link" href="#">Telegram</a></li>
                    </ul>
                </div>
            </footer>
        </div>

        <script src="{{ asset('/js/functions.js') }}"></script>
        <script src="{{ asset('/js/bundle.js') }}"></script>
        @stack("js")
    </body>
</html>
