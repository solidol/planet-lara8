<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body class="front">
    <div id="app">
        <nav class="navbar navbar-dark navbar-custom fixed-top navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{  route('home.show')  }}">
                    <img src="/storage/images/logo/headerlogo.svg">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.post.create', ['catId' => $currentCat->id ?? '0']) }}" class="button">Новий запис</a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news.show') }}">Новини</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.show') }}">Блоґ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('programs.show') }}">Програми</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('projects.show') }}">Проєкти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sessions.show') }}">Сеанси</a>
                        </li>
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.news.show') }}">Адмінпанель</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="container-fluid">
                <div id="carouselBanners" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/images/banner/banner0.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/images/banner/banner1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/images/banner/banner2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/images/banner/banner3.jpg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/images/banner/banner4.jpg" alt="Third slide">
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#carouselBanners').carousel({
                            interval: 4000,
                            ride: true
                        });
                    });
                </script>
                @yield('banner')
            </div>
            <div class="container">
                <div class="row m-5">

                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-9">
                        @yield('content')
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <div class="position-sticky sidebar-fixed">
                            <div class="p-4">
                                <h2>Онлайн оплата</h2>
                                <p>Тепер сплатити за сеанс можна, перерахувавши кошти з вашого віртуального рахунку за посиланням: <a href="https://www.privat24.ua/rd/send_qr/liqpay_static_qr/qr_6fcdb890b8064aed9dbb9e175d9ec0cf">privat24</a></p>
                            </div>
                            <div class="p-4">
                                <h2>Архів</h2>
                                <ol class="list-unstyled mb-0">
                                    <li><a href="#">March 2021</a></li>
                                    <li><a href="#">February 2021</a></li>
                                    <li><a href="#">January 2021</a></li>
                                    <li><a href="#">December 2020</a></li>
                                    <li><a href="#">November 2020</a></li>
                                    <li><a href="#">October 2020</a></li>
                                    <li><a href="#">September 2020</a></li>
                                    <li><a href="#">August 2020</a></li>
                                    <li><a href="#">July 2020</a></li>
                                    <li><a href="#">June 2020</a></li>
                                    <li><a href="#">May 2020</a></li>
                                    <li><a href="#">April 2020</a></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>