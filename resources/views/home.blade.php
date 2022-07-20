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

        <article id="art-{{ $post->id }}" class="blog-post col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="row post-header">
                <div class="col-12 blog-post-meta">{{date('d.m.Y',strtotime($post->created_at))}}</div>
                <h3 class="col-12 blog-post-title">
                    <a href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">{{ $post->title }}</a>
                </h3>
            </div>
            <div class="row post-content">
                <div class="col-4 post-image">
                    <img src="/{{$post->postimg}}">
                </div>
                <div class="col-8 post-paper">

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
            <div class="row post-footer">

                <div class="post-social">
                    <!--
                    <a href="" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="" target="_blank"><i class="fa fa-pinterest"></i></a>-->
                </div>
            </div>

        </article>

    <?php endforeach; ?>

</div>


@endsection