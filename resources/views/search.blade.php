@extends("layouts.master")

@section('title', 'Search')

@section('css')
    <style>
        .sub-title {
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

        .error {
            height: 300px;
        }
    </style>
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 sub-title">Search Result: {{$search}} </h2>
        @if (count($posts) > 1)
            <div class="row mb-0 mb-md-4">
            @foreach ($posts as $post)
                <?php
                $content = str_replace("\"", "\\\"", $post->content);
                $content = strip_tags($content);
                ?>
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <a href="/posts/{{ $post->id }}" class="text-decoration-none text-dark blog">
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
                    </a>
                </div>
            @endforeach
        @else
            <div class="error d-flex align-items-center justify-content-center">
                <h1>No Result Found!</h1>
            </div>
        @endif
        {{-- <div>{{ $posts->links() }}</div> --}}
    </div>
</div>
@endsection