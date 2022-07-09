@extends('layouts.app')

@section('header')
<div class="text-white">
    <h1 class="mb-3"><?= $post->title ?></h1>
    <h4 class="mb-3"><?= $currentCat->title ?></h4>
</div>
@endsection


@section('content')

<article id="art-<?= $post->id ?>" class="blog-post">
    <div class="row post-header">
        <h2 class="col-8">
            <?= $post->title ?></a>
        </h2>
        <p class="col-4 post-meta-date"><?= date('d.m.Y', strtotime($post->created_at)) ?></p>
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

@endsection