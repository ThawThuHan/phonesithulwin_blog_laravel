@extends('layouts/master')

@section('css')
    <link rel="stylesheet" href="css/contact.css">
@endsection

@section('content')
    <div class="container-fluid" style="background-color: skyblue;">
        <h1 class="sub-title text-center p-3 m-3" style="color:white; text-shadow:2px 2px 4px #000000;">Contact</h1>

        <div class="container contact-container p-3 ">
            <div class="row mb-5">
                <div class="contact-image col-md-4 shadow rounded mb-3">
                    <img src="assets/images/2.jpg" alt="" style="width: 100%; height: 225px; object-fit:cover">
                </div>
                <div class="contact-content col-md-8 ">
                    <p>
                        ကျနော့်ကို မေးချင်တာရှိလို့ဘဲဖြစ်ဖြစ် feedback ပြန်ပေးချင်လို့ဘဲဖြစ်ဖြစ် အောက်က form ကိုဖြည့်ပြီး မေးထားလို့ရပါတယ် ခင်ဗျာ ကျနော့်အနေနဲ့ အတက်နိုင်ဆုံး ပြန်လည်ဖြေကြားပေးပါမယ် ခင်ဗျာ
                        ကျနော် သည် ပုဂ္ဂလိဂ် ဆေးရုံ က ဆရာဝန်တစ်ယောက်ဖြစ်သလို့ ဆေးနဲ့ပတ်သက်သည့် စာများ blogများ ရေးသားသောသူဖြစ်သောကြောင့် ပြန်လည်ဖြေကြားရာ၌ အချိန် အနည်းငယ်နောက်ကျနိုင်ပါသည်

                        အလားတူ facebook page ကဖြစ်စေ telegram channel ကဖြစ်စေ youtube channel ၏ comment box မှဖြစ်စေ မေးမြန်းနိုင်ပါသည်
                    </p>
                </div>
            </div>
            <!-- Start Contact Form -->
            <div class="message-form container col-xs-12 col-md-8 col-lg-9">

                <form action="_actions/sender.php" id="form" method="post" class="form">
                    <div class="mb-2 form-group ">
                        <label for="yname">
                            <h5>Enter Your Name</h5>
                        </label>
                        <input type="text" name="yname" class="form-control" id="yname" placeholder="ဥပမာ- ခင်မောင်ထွန်း">

                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>

                    <div class=" mb-2 form-group ">
                        <label for="email">
                            <h5>Enter your email</h5>
                        </label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="ဥပမာ- khinmaungtun1990@gmail.com">

                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>

                    <div class="mb-2 form-group">
                        <label for="messages">
                            <h5>Enter your messages</h5>
                        </label>
                        <textarea name="messages" cols="30" rows="10" id="messages" class="form-control" placeholder="မိတ်ဆွေ ပြောဆိုချင်သောအကြောင်းအရာ (သို့) မေးချင်သောအကြောင်းအရာ"></textarea>

                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>

            </div>
            <?php if (isset($_GET['success']) && $_GET['success'] == true) : ?>
                <script>
                    alert('Email send!')
                </script>
            <?php elseif (isset($_GET['fail']) && $_GET['fail'] == false) : ?>
                <script>
                    alert('Email send fail!')
                </script>
            <?php endif; ?>
            <!-- End Contact Form -->
        </div>
    </div>
@endsection

@section('script_src')
    <script src="js/contact.js"></script>
@endsection