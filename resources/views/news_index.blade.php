@extends('layouts.app')

@section('header')
<div class="text-white">
    <h1 class="mb-3"><?=$currentCat->title ?></h1>
    <h4 class="mb-3"></h4>
</div>
@endsection


@section('content')


@auth
<div class="post-add">
    <a href="<?= route('post.create', ['catId' => $currentCat->id ?? '']) ?>" class="button">New</a>
</div>
@endauth

<div class="row m-5">
    <div class="col-md-8">
        <?php foreach ($posts as $post) : ?>

            <article id="art-<?= $post->id ?>" class="blog-post">
                <div class="post-header">
                    <h2 class="blog-post-title">
                        <a href="<?= route('post.showbyslug', ['postSlug' => $post->slug]) ?>"><?= $post->title ?></a>
                    </h2>
                    @auth
                    <div class="post-edit">
                        <a href="<?= route('post.edit', ['postId' => $post->id]) ?>" class="button">Edit</a>
                    </div>
                    <div class="post-edit">
                        <a href="<?= route('post.edit', ['postId' => $post->id]) ?>" class="button">Del</a>
                    </div>
                    @endauth
                    <p class="blog-post-meta">January 1, 2021</p>
                </div>
                <div class="post-image">
                        <img src="/images/{{$post->postimg}}">
                </div>
                <div class="post-paper">
                    @if (isset($post->alterpreview) && !empty($post->alterpreview))
                    {!! $post->alterpreview !!}
                    @else
                    {!! Str::before($post->content, '
                    <!--cut-->') !!}
                    @endif
                </div>
                <div class="post-footer">
                    <a class="more-link" href="<?= route('post.showbyslug', ['postSlug' => $post->slug]) ?>">More...</a>
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
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2022</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2021</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2020</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
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


<?php
//echo $posts->render();
?>
</div>


@endsection