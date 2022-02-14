@extends('layouts.master')

@section('title', $category->name)

@section('content')
<div class="container mt-3">
    <h2 class="text-center mb-4 sub-title"><?= $category->name ?></h2>
    <div class="row px-3">
        <?php foreach ($posts as $post) : ?>
            <?php
            $content = str_replace("\"", "\\\"", $post->content);
            $content = strip_tags($content);
            ?>
            <div onclick="location.href='/posts/{{ $post->id }}'" class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="card blogShadow">
                    <img src="{{ URL("storage/post_images/".$post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h5 class="card-title d-inline">{{ $post->title }}</h5>
                        <div class="text-muted">
                            <span>{{ $post->created_at }}</span>
                            <span class="card-subtitle float-end"><i class="fas fa-eye"></i> {{ $post->view_count }}</span>
                        </div>
                        <p class="card-text mt-4">
                            {{ mb_strimwidth($content, 0, 100, '...', 'utf-8') }}
                        </p>
                        <a href="/posts/{{ $post->id }}" class="btn btn-info mt-2 float-end text-white">Read more</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
@endsection