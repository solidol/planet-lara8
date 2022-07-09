@extends('layouts.app')

@section('header')
<div class="text-white">
    <h1 class="mb-3">{{ $currentCat->title }}</h1>
    <h4 class="mb-3"></h4>
</div>
@endsection


@section('content')

<div class="row">
    <?php foreach ($posts as $post) : ?>

        <article id="art-{{ $post->id }}" class="blog-post">
            <div class="row post-header">
                <div class="col-12 blog-post-meta">{{date('d.m.Y',strtotime($post->created_at))}}</div>
                <h2 class="col-12 blog-post-title">
                    <a href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">{{ $post->title }}</a>
                </h2>
            </div>
            <div class="row post-content">
                <div class="col-4 post-image">
                    <img src="/images/{{$post->postimg}}">
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
<nav aria-label="Page navigation">
    <?php
    echo $posts->onEachSide(5)->links();
    ?>
</nav>







@endsection