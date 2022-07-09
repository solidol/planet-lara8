@extends('layouts.app')

@section('header')
<div class="text-white">
    <h1 class="mb-3"><?= $post->title ?></h1>
    <h4 class="mb-3"><?= $currentCat->title ?></h4>
</div>
@endsection


@section('content')


<article id="art-{{$post->id}}" class="blog-post">
    <div class="row post-header">
        <h2 class="col-7 blog-post-title">
            <a href="{{ route('post.showbyslug', ['postSlug' => $post->slug]) }}">{{ $post->title }}</a>
        </h2>
        <p class="col-3 blog-post-meta">{{date('d.m.Y',strtotime($post->created_at))}}</p>
        @auth
        <div class="col-2">
            <div class="row">
                <div class="col-6 post-edit">
                    <a href="{{ route('admin.post.edit', ['postId' => $post->id]) }}" class="button">Edit</a>
                </div>
                <div class="col-6 post-edit">
                    <a href="{{ route('admin.post.edit', ['postId' => $post->id]) }}" class="button">Del</a>
                </div>
            </div>
        </div>
        @endauth
    </div>
    <div class="row post-image">
        <img src="/images/{{$post->postimg}}">
    </div>
    <div class="row post-paper">
        {{$post->content}}
    </div>

</article>

@endsection