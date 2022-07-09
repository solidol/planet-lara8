@extends('layouts.app')

@section('header')
<div class="text-white">
    <h1 class="mb-3"><?= $post->title ?></h1>
    <h4 class="mb-3"><?= $currentCat->title ?></h4>
</div>
@endsection


@section('content')


@auth
<div class="post-add">
    <a href="<?= route('post.create', ['catId' => $currentCat->id ?? '']) ?>" class="button">New</a>
</div>
@endauth

<div class="row">
    <div class="col-md-8">

        <article id="art-<?= $post->id ?>" class="blog-post">
            <div class="row post-header">
                <h2 class="col-8">
                    <?= $post->title ?></a>
                </h2>
                <p class="col-4 post-meta-date">January 1, 2021</p>
            </div>
            <div class="row post-image">
                <a href="">
                    <img src="">
                </a>
            </div>
            <div class="row post-paper">
                <?= $post->content ?>
            </div>

        </article>
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