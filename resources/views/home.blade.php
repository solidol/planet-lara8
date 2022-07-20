@extends('layouts.app')


@section('banner')

@endsection


@section('content')

<h2>СЕАНСИ ДЛЯ ВСІХ</h2>

<div class="row">
    <?php foreach ($sessions as $session) :

        $date = date_create($session->tg_date);
        $days = array(
            'НД',
            'ПН',
            'ВТ',
            'СР',
            'ЧТ',
            'ПТ',
            'СБ'
        );


    ?>
        <article id="art-{{ $session->id }}" class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="col-12 session-day">
                <span class="session-dow"><?= $days[date_format($date, "w")] ?></span>
                <span class="session-date"><?= date_format($date, "d.m.y") ?></span> о
                <span class="session-time"><?= date_format($date, "H:i") ?></span>
            </div>
            <h3 class="col-12 session-title">
                <a href="{{ route('post.showbyslug', ['postSlug' => $session->slug]) }}">{{ $session->title }}</a>
            </h3>
            <div class="col-12 session-text">
                <?= $session->content ?>
            </div>
        </article>
    <?php endforeach; ?>
</div>


<h2>ОСТАННІ НОВИНИ</h2>


<div class="row">







    <?php

    foreach ($posts as $post) : ?>

        <article id="art-{{ $post->id }}" class="blog-post col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row featurette">

                <div class="col-md-5 col-md-pull-7">
                    <img class="featurette-image img-responsive center-block" alt="500x500" src="/{{$post->postimg}}" data-holder-rendered="true">
                </div>
                <div class="col-md-7 col-md-push-5">
                    <h2 class="featurette-heading"><a href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">{{ $post->title }}</a></h2>
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


@endsection