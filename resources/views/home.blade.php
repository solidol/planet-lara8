@extends('layouts.app')


@section('banner')

@endsection


@section('sidebar')
<h2>Останні новини</h2>
<ol class="list-unstyled mb-0">

    <?php foreach ($posts as $post) : ?>
        <li>
            <article id="art-{{ $post->id }}" class="blog-post-aside">
                <div class="blog-post-meta">{{date('d.m.Y',strtotime($post->created_at))}}</div>
                <h3 class="featurette-heading"><a href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                <p>
                    <a class="more-link" href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">More...</a>
                </p>
            </article>
        </li>
    <?php endforeach; ?>


</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <h2 class="mb-3">СЕАНСИ ДЛЯ ВСІХ</h2>
    </div>
    <div class="col-6 text-right">
        <button id="slick-prev-s1" class="btn btn-sm btn-blue" type="button">
            <i class="fa fa-arrow-left"></i>
        </button>
        <button id="slick-next-s1" class="slick-arrow btn btn-sm btn-blue" type="button">
            <i class="fa fa-arrow-right"></i>
        </button>
    </div>
    <div class="col-12">
        <div id="carouselSessions" class="carousel slide" data-ride="carousel">

            <?php
            $days = array(
                'НД',
                'ПН',
                'ВТ',
                'СР',
                'ЧТ',
                'ПТ',
                'СБ'
            );
            $i = 0;
            foreach ($sessions as $session) :
                $date = date_create($session->tg_date);

            ?>
                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">

                    <div id="art-{{ $session->id }}" class="card">
                        <div class="card-body">
                            <div class="session-day">
                                <span class="session-dow"><?= $days[date_format($date, "w")] ?></span>
                                <span class="session-date"><?= date_format($date, "d.m.y") ?></span> о
                                <span class="session-time"><?= date_format($date, "H:i") ?></span>
                            </div>
                            <h3 class="session-title">
                                <a href="{{ route('post.showbyslug', ['postSlug' => $session->slug]) }}">{{ $session->title }}</a>
                            </h3>
                            <div class="session-text">
                                <?= $session->content ?>
                            </div>
                            <div class="sessions-bottom">
                                <a class="btn btn-sm btn-blue" target="_blank" href="https://www.privat24.ua/rd/send_qr/liqpay_static_qr/qr_6fcdb890b8064aed9dbb9e175d9ec0cf">Сплатити онлайн</a>
                            </div>
                        </div>

                    </div>
                </div>

            <?php
                $i++;

            endforeach;
            ?>


        </div>
    </div>
</div>

<h2>ЗАМОВИТИ СЕАНС</h2>


<div class="row">


</div>


<div class="row">
    <div class="col-6">
        <h2 class="mb-3">ПРИДБАТИ</h2>
    </div>
    <div class="col-6 text-right">
        <button id="slick-prev-s2" class="btn btn-sm btn-blue" type="button">
            <i class="fa fa-arrow-left"></i>
        </button>
        <button id="slick-next-s2" class="slick-arrow btn btn-sm btn-blue" type="button">
            <i class="fa fa-arrow-right"></i>
        </button>
    </div>
    <div class="col-12">
        <div id="carouselShop" class="carousel slide" data-ride="carousel">

            <?php

            $i = 0;
            foreach ($products as $product) :

            ?>
                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">

                    <div id="art-{{ $session->id }}" class="card">
                        <div class="card-body">
                            <div class="product-image">
                                <img class="post-image featurette-image img-responsive center-block" alt="500x500" src="/storage/{{$product->postimg}}" data-holder-rendered="true">
                            </div>
                            <h4 class="session-title">
                                {{ $product->title }}
                            </h4>
                            <div class="sessions-bottom">
                                <a class="btn btn-sm btn-blue" href="{{ route('post.showbyslug', ['postSlug' => $product->slug]) }}">Переглянути</a>
                            </div>
                        </div>

                    </div>
                </div>

            <?php
                $i++;

            endforeach;
            ?>


        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#carouselSessions').slick({
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: $('#slick-prev-s1'),
            nextArrow: $('#slick-next-s1'),
            responsive: [{
                    breakpoint: 1920,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false

                    }
                }
            ],
        });


        $('#carouselShop').slick({
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: $('#slick-prev-s2'),
            nextArrow: $('#slick-next-s2'),
            responsive: [{
                    breakpoint: 1920,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false

                    }
                }
            ],
        });
    });
</script>





@endsection