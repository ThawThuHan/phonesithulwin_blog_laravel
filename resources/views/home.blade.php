@extends('layouts/master')

@section('title', 'Home')

@section('css')
    <link rel="stylesheet" href="{{URL::asset("css/index.css")}}">
@endsection

@section('content')
<div class="banner container-fluid">
    <div class="container py-auto" id="title-box">
        <div class="row g-5">
            <div class="col-12 col-lg-6 d-flex flex-column align-items-center justify-content-center py-4">
                <h1 class="text-center text-white">Dr.Phone Sithu Lwin</h1>
                <h3 class="text-center text-white mb-5">Knowledge Sharing</h3>
                <p class=" text-white">
                    ကျနော့်ကို မေးချင်တာရှိလို့ဘဲဖြစ်ဖြစ် feedback ပြန်ပေးချင်လို့ဘဲဖြစ်ဖြစ် အောက်က form ကိုဖြည့်ပြီး မေးထားလို့ရပါတယ် ခင်ဗျာ ကျနော့်အနေနဲ့ အတက်နိုင်ဆုံး ပြန်လည်ဖြေကြားပေးပါမယ် ခင်ဗျာ
                    ကျနော် သည် ပုဂ္ဂလိဂ် ဆေးရုံ က ဆရာဝန်တစ်ယောက်ဖြစ်သလို့ ဆေးနဲ့ပတ်သက်သည့် စာများ blogများ ရေးသားသောသူဖြစ်သောကြောင့် ပြန်လည်ဖြေကြားရာ၌ အချိန် အနည်းငယ်နောက်ကျနိုင်ပါသည်

                    အလားတူ facebook page ကဖြစ်စေ telegram channel ကဖြစ်စေ youtube channel ၏ comment box မှဖြစ်စေ မေးမြန်းနိုင်ပါသည်
                </p>
                <div class="container d-flex align-items-center justify-content-center">
                    <a href="about.php" class="btn btn-info rounded-pill text-white">About me</a>
                </div>
            </div>
            <div class="col-12 col-md-6 d-none d-lg-flex align-items-center justify-content-center" id="morph">
                <img src="assets/images/title.jpg" alt="" class="w-75">
            </div>
        </div>
    </div>
</div>

<!-- recent posts -->
{{-- <div class="container mt-5">
    <h2 class="mb-4 sub-title">Recent Posts</h2>
    <div class="row mb-0 mb-md-4">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <a href="blog.php" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/drop.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">Falling Dream</h3>
                        <span class="float-end">1.2k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            အိပ်ယာအစပ်ထောင့်စွန်းနားဖြစ်ဖြစ်၊ ချောက်ကမ်းပါးအစွန်းနားဖြစ်ဖြစ်၊ ရေတွင်းအဝနားဖြစ်ဖြစ် ဘယ်လိုဘယ်ပုံရောက်သွားတယ်ဆိုတာမသိလိုက်ဘဲ အဲ့နေရာမှာပဲ ဒယိမ်းဒယိုင်နဲ့ ကျမလိုကျမလို ဖြစ်နေရာကနေ...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <a href="blog.php" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/stomach.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">အစာအိမ်အနာ</h3>
                        <span class="float-end">1.4k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            အူလမ်းကြောင်းကို အနားပေးချင်တဲ့အခါ ခွဲစိတ်ပြီးစရက်တွေမှာ ဘာမှမစားစေပါဘူး။ အူကပြန်ပြီးလှုပ်ရှားလာပြီဆိုရင် ရေကိုတစ်နာရီတစ်ဇွန်းဆိုပြီး တိုက်ပါတယ်။ အဓိကရည်ရွယ်ချက်က ခွဲစိတ်ဖြတ်တောက်ထားတဲ့အူကို အနားပေးချင်လို့ပါ။...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <a href="blog.php" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/boil.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">Boiling water</h3>
                        <span class="float-end">2.4k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">ရေသန့်ဗူးထဲက ရေသန့်ကိုကြိုချက်ပြီးမသောက်ရဘူးလို့ပြောကြတယ်ဆရာ။ အန္တရာယ်ရှိတယ်တဲ့။ ဘာအန္တရာယ်ရှိတာလဲ? မသိဘူးတဲ့ သူများပြောတာကိုပြောကြတာဆိုပဲ။ ရေသန့်ဆိုပြီးပုလင်းထဲထည့်ထားတဲံရေတွေကို...</p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <a href="blog.php" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/dizziness.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">Dizziness</h3>
                        <span class="float-end">2.2k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            ခေါင်းထဲရိပ်တိတ်ရိပ်တိတ်မူးနေတတ်တယ်။ ကျီးပေါင်းများရှိနေလားမသိဘူး။ အသက်၄၀-၅၀ ရှိလာရင် အရိုးကျီးပေါင်းရှိတတ်ပါတယ်။ ရှိပဲရှိတာပါ ဒုက္ခမပေးပါဘူး။ ကျီးပေါင်းကြောင့်မူးတယ်ဆိုတာက ချာချာလည်အောင်မူးတာပါ။...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <a href="blog.php" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/vitamin.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">Vitamin</h3>
                        <span class="float-end">1.3k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            "ဘာအားဆေးသောက်ရမလဲဆရာ?" အားဆေးဆိုတာဘာလဲ? အားဆေးလို့ဘယ်သူကဂျင်းထည့်ပြီး နာမည်ပေးခဲ့လဲမသိပါဘူးဗျာ။ နာမည်ကြားလိုက်ရတာနဲ့ အဲ့ဒါသောက်လိုက်ရင် အားတွေရှိသွားမယ် ဝဖြိုးလာမယ်လို့ အထင်ရောက်သွားစေပါတယ်။...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <a href="blog.php" class="text-decoration-none text-dark blog">
                <div class="card blogShadow">
                    <img src="assets/images/yawning.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title d-inline">Yawning</h3>
                        <span class="float-end">1.2k<i class="fas fa-eye"></i></span>
                        <br>
                        <br>
                        <p class="card-text">
                            သမ်းတာတစ်ဝက်တစ်ပျက်နဲ့ရပ်ရပ်သွားပါတယ် အဆုံးအထိသမ်းလို့မရဘဲ ခဏခဏပြန်ပြန်သမ်းနေပါတယ် ဘာလို့သမ်းရတာလဲ? အိပ်ချင်လို့ အိပ်ငိုက်လို့ ပင်ပန်းလာလို့ လို့ ပြောတတ်ကြပါတယ် (100% အပြည့် မမှန်ပါဘူး)...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div> --}}

<div class="container mt-5">
    <h2 class="mb-4 sub-title">Recent Posts</h2>
    <div class="row mb-0 mb-md-4">
        @foreach ($recentPosts as $post)
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
        <div>{{ $recentPosts->links() }}</div>
    </div>
</div>

<!-- popular posts -->
<div class="container mt-3">
    <h2 class="mb-4 sub-title">Popular Posts</h2>
    <div class="row mb-4">
        @foreach ($popularPosts as $post)
        <?php
        $content = str_replace("\"", "\\\"", $post->content);
        $content = strip_tags($content);
        ?>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <a href="blog.php" class="text-decoration-none text-black blog">
                <div class="card blogShadow">
                    <img src="{{ URL("storage/post_images/".$post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <div class="float-end">{{ $post->view_count }}<i class="fas fa-eye"></i></div>
                        <p class="card-text mt-5 mb-2">
                            {{ mb_strimwidth($content, 0, 100, '...', 'utf-8') }}
                        </p>
                        <span>{{ $post->created_at }}</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        {{-- <div class="col-12 col-md-6 col-lg-3 mb-3">
            <a href="blog.php" class="text-decoration-none text-black blog">
                <div class="card blogShadow">
                    <img src="assets/images/omicron.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title">Omicron</h3>
                        <div class="float-end">2.7k<i class="fas fa-eye"></i></div>
                        <p class="card-text mt-5 mb-2">
                            ကိုဗစ်မျိုးကွဲသစ်တွေ့ကြပြန်ပါပြီ ပြင်သစ်မှာတွေ့တာပါတဲ့ မျိုးကွဲအသစ်ပေါ်နိုင်လွန်းတဲ့ ငဗစ်ပါပဲ ဒါပေမယ့်လည်း သတ္တဝါတစ်ကောင်ကဖြစ်တည်လာပြီးရင်...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <a href="blog.php" class="text-decoration-none text-black blog">
                <div class="card blogShadow">
                    <img src="assets/images/Diabetes.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title">Diabetes Mellitus</h3>
                        <div class="float-end">2.7k<i class="fas fa-eye"></i></div>
                        <p class="card-text mt-5 mb-2">
                            ဆီးသွားတာများတယ် ညတွေလည်းထထသွားရတယ် စားနေတာပဲကိုဆာနေတယ် လူကလည်းနုံးနေတယ် ဆီးချိုရောဂါစဖြစ်နေပြီတဲ့ ဘယ်လိုလုပ်ရမလဲ ဘာတွေစားရမလဲ...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <a href="blog.php" class="text-decoration-none text-black blog">
                <div class="card blogShadow">
                    <img src="assets/images/cancer.jpg" class="card-img-top" alt="...">
                    <div class="card-body border-bottom">
                        <h3 class="card-title">Cancer Survivor</h3>
                        <div class="float-end">2.7k<i class="fas fa-eye"></i></div>
                        <p class="card-text mt-5 mb-2">
                            ကင်ဆာရောဂါဆိုတာ ပေါကားတွေထဲကလို သေမိန့်ချခံလိုက်ရတဲ့ရောဂါမဟုတ်ပါဘူး အရပ်ထဲမှာဆို ပေါကားတွေထဲက Dialog တွေဖြစ်တဲ့ အသည်းဆို(၆)လ...
                        </p>
                        <span>Jan 14,2021</span>
                        <a href="blog.php" class="btn btn-info float-end text-white">Read more</a>
                    </div>
                </div>
            </a>
        </div> --}}
    </div>
</div>

<!-- books -->
<div class="container mt-5" id="book">
    <div class="container-fluid my-3">
        <i class="fas fa-book fs-2 m-0"></i>
        <!-- <i class="fas fa-book-medical"></i> -->
        <h3 class="d-inline sub-title">ထွက်ရှိပြီးသောစာအုပ်များ...</h3>
        <span class="btn btn-secondary ms-3">{{ count($books) }} books</span>
    </div>

    <div class="py-2" id="post-view">
        <div class="row">
            <?php foreach ($books as $book) : ?>
                <?php
                $images = json_decode($book->images);
                ?>
                <div onclick="location.href='/book/{{ $book->id }}/order'" class="col-12 col-md-6">
                    <div class="card mb-3 mx-3 blogShadow">
                        <div class="row g-0">
                            <div class="col-md-4 book">
                                <img src="{{ URL("storage/book_images/".$images[0]) }}" class="" alt="..." style="object-fit: cover; width: 100%; height: 280px;">
                            </div>
                            <div class="col-md-8 p-3 d-flex flex-column justify-content-between">
                                <h5 class="card-title d-inline"><b><?= $book->name ?></b></h5>
                                {{-- <div class="float-end my-3"><?= $book->order_count ?><i class="fas fa-shopping-cart"></i></div> --}}
                                <p class="card-text mt-4 mb-2">
                                    <?= $book->preview_content ?>
                                </p>
                                <div class="d-flex justify-content-between">
                                    <span class="float-start my-3 text-danger"><?= $book->price." Ks" ?></span>
                                    <a href="/book/<?= $book->id ?>/order" class="btn btn-info text-white my-2">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
    
@endsection