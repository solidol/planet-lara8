@extends('layouts.admin')

@section('header')
<div class="text-white">
    <h1 class="mb-3"><?= $currentCat->title ?></h1>
    <h4 class="mb-3"></h4>
</div>
@endsection

@section('content')

<?php foreach ($posts as $post) : ?>


    <div class="row row-hovered">
        <span class="col-1 adm-tab-string">
            <?= $post->id ?>
        </span>
        <span class="col-6 adm-tab-string">
            <?= $post->title ?>
        </span>
        <span class="col-2 adm-tab-string">
            <?= date('d.m.Y', strtotime($post->created_at)) ?>
        </span>

        <a class="col-1 adm-tab-string" href="<?= route('admin.post.show', ['postId' => $post->id]) ?>">Show</a>
        <a class="col-1 adm-tab-string" href="<?= route('admin.post.edit', ['postId' => $post->id]) ?>" class="button">Edit</a>
        <a class="col-1 adm-tab-string" href="<?= route('admin.post.edit', ['postId' => $post->id]) ?>" class="button">Del</a>
    </div>



<?php endforeach; ?>



<nav aria-label="Page navigation">
    <?php
    echo $posts->onEachSide(5)->links();
    ?>
</nav>


@endsection