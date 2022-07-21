@extends('layouts.app')


@section('banner')

@endsection


@section('content')




<div class="row">
    <div class="col-6">
        <h2 class="mb-3">СЕАНСИ ДЛЯ ВСІХ</h2>
    </div>
    <div class="col-6 text-right">
        <button class="slick-prev btn btn-sm btn-blue" type="button">
            <i class="fa fa-arrow-left"></i>
        </button>
        <button class="slick-next slick-arrow btn btn-sm btn-blue" type="button">
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

<script>
    $(document).ready(function() {
        /*  $('#carouselSessions').carousel({
              interval: 5000,
              // ride: true
          });*/

        $('#carouselSessions').slick({
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: $('.slick-prev'),
            nextArrow: $('.slick-next'),
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


<h2>ОСТАННІ НОВИНИ</h2>


<div class="row">
    <?php

    foreach ($posts as $post) : ?>

        <article id="art-{{ $post->id }}" class="blog-post col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row ">

                <div class="col-md-5 col-md-pull-7">
                    <img class="post-image" alt="{{ $post->title }}" src="/storage/{{$post->postimg}}">
                </div>
                <div class="col-md-7 col-md-push-5">
                    <h3 class="featurette-heading">
                        <a href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                    <div class="blog-post-meta">{{date('d.m.Y',strtotime($post->created_at))}}</div>
                    @if (isset($post->alterpreview) && !empty($post->alterpreview))
                    <?= $post->alterpreview ?>
                    @else
                    <?= Str::before($post->content, '<!--cut-->') ?>
                    @endif

                    <p>
                        <a class="more-link" href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">More...</a>
                    </p>
                </div>
            </div>
        </article>

    <?php endforeach; ?>

</div>

<script>

</script>

@endsection