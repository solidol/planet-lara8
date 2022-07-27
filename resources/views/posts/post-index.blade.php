@extends('layouts.app')

@section('header')
<div class="text-white">
    <h1 class="mb-3">{{ $currentCat->title }}</h1>
    <h4 class="mb-3"></h4>
</div>
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
<h1><?= $currentCat->title ?></h1>
<div class="row">
    <?php foreach ($posts as $post) : ?>

        <article id="art-{{ $post->id }}" class="blog-post col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row featurette">

                <div class="col-md-5 col-md-pull-7">
                    <img class="post-image featurette-image img-responsive center-block" alt="500x500" src="/storage/{{$post->postimg}}" data-holder-rendered="true">
                </div>
                <div class="col-md-7 col-md-push-5">
                    <h2 class="featurette-heading"><a href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">{{ $post->title }}</a></h2>
                    <div class="blog-post-meta">{{date('d.m.Y',strtotime($post->created_at))}}</div>
                    <div class="post-paper">
                        @if (isset($post->alterpreview) && !empty($post->alterpreview))
                        <?= $post->alterpreview ?>
                        @else
                        <?= Str::before($post->content, '<!--cut-->') ?>
                        @endif
                    </div>
                    <p>
                        <a class="more-link" href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">More...</a>
                    </p>
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