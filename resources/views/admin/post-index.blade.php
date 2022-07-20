@extends('layouts.admin')

@section('header')
<div class="text-white">
    <h1 class="mb-3"><?= $currentCat->title ?></h1>
    <h4 class="mb-3"></h4>
</div>
@endsection

@section('content')

<h1><?= $currentCat->title ?></h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Назва</th>
            <th scope="col">Дата створення</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post) : ?>
            <tr>
                <td><?= $post->id ?></td>
                <td><a class="col-1 adm-tab-string" href="<?= route('admin.post.show', ['postId' => $post->id]) ?>"><?= $post->title ?></a></td>
                <td><?= date('d.m.Y', strtotime($post->created_at)) ?></td>
                <td><a class="col-1 adm-tab-string" href="<?= route('admin.post.edit', ['postId' => $post->id]) ?>" class="button">Edit</a></td>
                <td><a class="col-1 adm-tab-string" href="<?= route('admin.post.edit', ['postId' => $post->id]) ?>" class="button">Del</a></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>

<nav aria-label="Page navigation">
    <?php
    echo $posts->onEachSide(5)->links();
    ?>
</nav>


@endsection