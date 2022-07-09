@extends('layouts.admin')

@section('header')
<div class="text-white">
    <h1 class="mb-3"><?= $currentCat->title ?></h1>
    <h4 class="mb-3"></h4>
</div>
@endsection


@section('content')


@auth
<div class="post-add">
    <a href="<?= route('admin.post.create', ['catId' => $currentCat->id ?? '']) ?>" class="button">New</a>
</div>
@endauth


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


<?php
//echo $posts->render();
?>
</div>


@endsection