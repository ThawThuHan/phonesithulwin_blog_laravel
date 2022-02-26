@extends('layouts.master')

@section('metatags')
<meta property="og:type" content="website" />
<meta property="og:image" content="{{ asset('storage/post_images/'.$current->image) }}" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("css/content-styles.css") }}">
@endsection

@section('title', $current->title)

@section('content')
<div class="row mx-2">
    <div class="col-sm-12 col-md-8">
        <div class="mb-4" style="width: 100%; height: 350px;">
            <img src="{{ asset('storage/post_images/'.$current->image) }}" alt="" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <h2 class="">{{ $current->title }}</h2>
        <span>{{ $current->created_at->diffForHumans() }}</span>
        <small>-by <b>Dr.Phone Sithu Lwin</b></small>
        <div class="ck-content">
            {!! $current->content !!}
        </div>

        <!-- share -->
        <h6 class="mx-5 border-top d-inline">Share this:</h6>
        <div class="mx-5 mt-1 d-flex align-items-center gap-1" id="footer">
            <!-- copy link -->
            <a id="copyurl" class="fas fa-link fs-3 mx-1 my-2 text-decoration-none"></a>
            <!-- facebook -->
            <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" class="fab fa-facebook fs-3 text-primary mx-1 my-2 text-decoration-none"></a>
            <!-- telegram -->
            <a href="https://t.me/share?url={{ Request::url() }}" class="fab fa-telegram fs-3 mx-1 my-2 text-decoration-none"></a>
            <!-- twitter -->
            <a href="https://twitter.com/intent/tweet?original_referer={{ Request::url() }}" class="fab fa-twitter fs-3 text-primary mx-1 my-2 text-decoration-none"></a>
            <!-- linkedin -->
            <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}" class="fab fa-linkedin fs-3 mx-1 my-2  text-decoration-none"></a>
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <!-- popular posts -->
        <h3 class="">Popular Posts</h3>
        @foreach ($popular as $post)
        <?php
        $content = str_replace("\"", "\\\"", $post->content);
        $content = strip_tags($content);
        ?>
        <a href="/posts/{{ $post->id }}">
            <div class="row my-2">
                <div class="col-3">
                    <div class="" style="width: 100%; height: 65px;">
                        <img src="{{ asset('storage/post_images/'.$post->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-9 d-flex align-items-center">
                    <p>
                        {{ mb_strimwidth($content, 0, 100, '...', 'utf-8') }}
                    </p>
                </div>
            </div>
        </a>
        <hr>
        @endforeach

        <!-- recent posts -->
        <h3 class="mt-4">Recent Posts</h3>
        @foreach ($recentPosts as $post)
        <?php
        $content = str_replace("\"", "\\\"", $post->content);
        $content = strip_tags($content);
        ?>
        <a href="/posts/{{ $post->id }}">
            <div class="row my-2">
                <div class="col-3">
                    <div class="" style="width: 100%; height: 65px;">
                        <img src="{{ asset('storage/post_images/'.$post->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-9 d-flex align-items-center">
                    <p>
                        <b>{{ mb_strimwidth($content, 0, 100, '...', 'utf-8') }}</b>
                    </p>
                </div>
            </div>
        </a>
        <hr>
        @endforeach
    </div>
</div>

<!-- related posts -->
<h2 class="mx-2 mt-5">Related Posts</h2>
<div class="row mx-2 mt-3">
    <div class="row g-0 g-md-3">
        @foreach ($relatedPosts as $post)
        <?php
        $content = str_replace("\"", "\\\"", $post->content);
        $content = strip_tags($content);
        ?>
        <div class="col-xs-12 col-md-4 col-sm-6 mb-3">
            <a href="/posts/{{ $post->id }}" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="{{ asset("storage/post_images/".$post->image) }}" class="card-img-top" style="height: 200px;" alt="...">
                    <div class="card-body border-bottom">
                        <h5 class="card-title d-inline">{{ $post->title }}</h5>
                        <span class="float-end">{{ $post->view_count }}<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            {{ mb_strimwidth($content, 0, 100, '...', 'utf-8') }}
                        </p>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <a href="/posts/{{ $post->id }}" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
    <script>
        let copy = document.querySelector("#copyurl");
        copy.addEventListener("click", function(e) {
            e.preventDefault();
            let url = window.location.href;
            let result = navigator.clipboard.writeText(url);
            result.then(() => {
                alert("link copied!")
            })
        })
    </script>
@endsection