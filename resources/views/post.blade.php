@extends('layouts.master')

@section('title', $current->title)

@section('content')
<div class="row mx-2">
    <div class="col-sm-12 col-md-8">
        <div class="mb-4" style="width: 100%; height: 350px;">
            <img src="{{ asset('storage/post_images/'.$current->image) }}" alt="" style="width: 100%; height: 100%; object-fit: contain;">
        </div>
        <h2 class="">{{ $current->title }}</h2>
        <span>{{ $current->created_at }}</span>
        <small>-by <b>Dr.Phone Sithu Lwin</b></small>
        <p>
            <?= $current->content ?>
        </p>

        <!-- share -->
        <h6 class="mx-5 border-top d-inline">Share this:</h6>
        <?php
        $url = rawurlencode("http://localhost/phonesithulwin_blog/blog.php");
        ?>
        <div class="mx-5 mt-1 d-flex align-items-center gap-1" id="footer">
            <!-- facebook -->
            <a href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" class="fab fa-facebook fs-4 text-primary mx-1 my-2 text-decoration-none"></a>
            <!-- telegram -->
            <a href="https://t.me/share?url={{ Request::url() }}" class="fab fa-telegram fs-4 mx-1 my-2 text-decoration-none"></a>
            <!-- twitter -->
            <a href="https://twitter.com/intent/tweet?original_referer={{ Request::url() }}" class="fab fa-twitter fs-4 text-primary mx-1 my-2 text-decoration-none"></a>
            <!-- linkedin -->
            <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}" class="fab fa-linkedin fs-4"></a>
            <!-- <a href="#" class="fab fa-pinterest fs-4 text-danger mx-1 my-2 text-decoration-none"></a> -->
        </div>
    </div>
    <div class="col-md-4 col-xs-12">
        <!-- popular posts -->
        <h3 class="">Popular Posts</h3>
        @foreach ($popular as $post)
        <a href="/posts/{{ $post->id }}">
            <div class="row my-2">
                <div class="col-3">
                    <div class="" style="width: 100%; height: 65px;">
                        <img src="{{ asset('storage/post_images/'.$post->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-9 d-flex align-items-center">
                    <p>
                        <b>{{ $post->title }}</b>
                    </p>
                </div>
            </div>
        </a>
        <hr>
        @endforeach

        <!-- recent posts -->
        <h3 class="mt-4">Recent Posts</h3>
        @foreach ($recentPosts as $post)
        <a href="/posts/{{ $post->id }}">
            <div class="row my-2">
                <div class="col-3">
                    <div class="" style="width: 100%; height: 65px;">
                        <img src="{{ asset('storage/post_images/'.$post->image) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                <div class="col-9 d-flex align-items-center">
                    <p>
                        <b>{{ $post->title }}</b>
                    </p>
                </div>
            </div>
        </a>
        <hr>
        @endforeach
    </div>
</div>

<!-- share -->
<!-- <h6 class="mx-5 border-top d-inline">Share this:</h6>
<div class="mx-5 mt-1 d-flex align-items-center gap-1" id="footer">
    <a href="#" class="fab fa-facebook fs-4 text-primary mx-1 my-2 text-decoration-none"></a>
    <a href="#" class="fab fa-telegram fs-4 mx-1 my-2 text-decoration-none"></a>
    <a href="#" class="fab fa-youtube fs-4 text-danger mx-1 my-2 text-decoration-none"></a>
    <a href="#" class="fab fa-twitter fs-4 text-primary mx-1 my-2 text-decoration-none"></a>
    <a href="#" class="fab fa-pinterest fs-4 text-danger mx-1 my-2 text-decoration-none"></a>
</div>
<hr><hr> -->
<!-- related posts -->
<h2 class="mx-2 mt-5">Related Posts</h2>
<div class="row mx-2 mt-3">
    <div class="row g-0 g-md-3">
        @foreach ($relatedPosts as $post)
        <div class="col-xs-12 col-md-4 col-sm-6 mb-3">
            <a href="/posts/{{ $post->id }}" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="{{ asset("storage/post_images/".$post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">{{ $post->title }}</h3>
                        <span class="float-end">1.2k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            {{ mb_strimwidth($post->content, 0, 100, '...', 'utf-8') }}
                        </p>
                        <span>{{ $post->created_at }}</span>
                        <a href="/posts/{{ $post->id }}" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        {{-- <div class="col-xs-12 col-md-4 col-sm-6 mb-3">
            <a href="#" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/drop.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">Falling Dream</h3>
                        <span class="float-end">1.2k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            အိပ်ယာအစပ်ထောင့်စွန်းနားဖြစ်ဖြစ်၊ ချောက်ကမ်းပါးအစွန်းနားဖြစ်ဖြစ်၊ ရေတွင်းအ၀နားဖြစ်ဖြစ် ဘယ်လိုဘယ်ပုံရောက်သွားတယ်ဆိုတာမသိလိုက်ဘဲ အဲ့နေရာမှာပဲ ဒယိမ်းဒယိုင်နဲ့ ကျမလိုကျမလို ဖြစ်နေရာကနေ...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="#" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="ccol-xs-12 col-md-4 col-sm-6 mb-3">
            <a href="#" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/dizziness.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">Falling Dream</h3>
                        <span class="float-end">1.2k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            အိပ်ယာအစပ်ထောင့်စွန်းနားဖြစ်ဖြစ်၊ ချောက်ကမ်းပါးအစွန်းနားဖြစ်ဖြစ်၊ ရေတွင်းအ၀နားဖြစ်ဖြစ် ဘယ်လိုဘယ်ပုံရောက်သွားတယ်ဆိုတာမသိလိုက်ဘဲ အဲ့နေရာမှာပဲ ဒယိမ်းဒယိုင်နဲ့ ကျမလိုကျမလို ဖြစ်နေရာကနေ...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="#" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xs-12 col-md-4 col-sm-6 mb-3">
            <a href="#" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/stomach.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">Falling Dream</h3>
                        <span class="float-end">1.2k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            အိပ်ယာအစပ်ထောင့်စွန်းနားဖြစ်ဖြစ်၊ ချောက်ကမ်းပါးအစွန်းနားဖြစ်ဖြစ်၊ ရေတွင်းအ၀နားဖြစ်ဖြစ် ဘယ်လိုဘယ်ပုံရောက်သွားတယ်ဆိုတာမသိလိုက်ဘဲ အဲ့နေရာမှာပဲ ဒယိမ်းဒယိုင်နဲ့ ကျမလိုကျမလို ဖြစ်နေရာကနေ...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="#" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div> --}}
    </div>

    {{-- <div class="d-flex">
        <div class="me-auto">
            <h5 class="mb-3 text-secondary"><a href="/posts/{{ $relatedPosts->first()->id }}">PREVIOUS POST</a></h5>
        </div>
        <div class="ms-auto">
            <h5 class="mb-3 text-secondary"><a href="/posts/{{ $current->id + 1 }}">NEXT POST</a></h5>
        </div>
    </div> --}}

</div>
@endsection