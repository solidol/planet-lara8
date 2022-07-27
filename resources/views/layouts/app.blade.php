<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body class="front">
    <div id="app">
        @include('menu')

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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanners" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBanners" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#carouselBanners').carousel({
                            interval: 3000,
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
                                @yield('sidebar')

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>