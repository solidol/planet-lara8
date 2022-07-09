@extends('layouts.app')

@section('header')
<div class="text-white">
    <h1 class="mb-3">{{ $currentCat->title }}</h1>
    <h4 class="mb-3"></h4>
</div>
@endsection


@section('content')


@auth
<div class="post-add">
    <a href="{{ route('admin.post.create', ['catId' => $currentCat->id ?? '']) }}" class="button">New</a>
</div>
@endauth

<div class="row m-5">
    <div class="col-md-8">
        <?php foreach ($posts as $post) : ?>

            <article id="art-{{ $post->id }}" class="blog-post">
                <div class="row post-header">
                    <h2 class="col-9 blog-post-title">
                        <a href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="col-3 blog-post-meta">{{date('d.m.Y',strtotime($post->created_at))}}</p>
                    @auth
                    <div class="row">
                        <div class="col-2 post-edit">
                            <a href="{{ route('admin.post.edit', ['postId' => $post->id]) }}" class="button">Edit</a>
                        </div>
                        <div class="col-2 post-edit">
                            <a href="{{ route('admin.post.edit', ['postId' => $post->id]) }}" class="button">Del</a>
                        </div>
                    </div>
                    @endauth

                </div>
                <div class="row post-image">
                    <img src="/images/{{$post->postimg}}">
                </div>
                <div class="row post-paper">
                    @if (isset($post->alterpreview) && !empty($post->alterpreview))
                    {!! $post->alterpreview !!}
                    @else
                    {!! Str::before($post->content, '
                    <!--cut-->') !!}
                    @endif
                </div>
                <div class="row post-footer">
                    <a class="more-link" href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">More...</a>
                    <div class="post-social">
                        <!--
                        <a href="" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="" target="_blank"><i class="fa fa-pinterest"></i></a>-->
                    </div>
                </div>
            </article>

        <?php endforeach; ?>

        <nav aria-label="Page navigation">
            <?php
            echo $posts->onEachSide(5)->links();
            ?>
    </div>
    </nav>
</div>

<div class="col-md-4">
    <div class="position-sticky sidebar-fixed" style="top: 5rem;">
        <div class="p-4">
            <h4>Архів</h4>
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





@endsection