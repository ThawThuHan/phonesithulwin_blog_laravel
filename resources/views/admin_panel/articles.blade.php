@extends('layouts.admin_panel_master')

@section('title', 'Articles')

@section('style')
<style>
    .myCustom-card img {
        width: 100%;
        height: 150px;
        /* background-color: darkslateblue; */
    }

    .myCustom-text {
        word-wrap: break-word;
    }
</style>
@endsection
    
@section('content')
<div class="col-12 col-md-10 px-2">
    <div id="menuToggle" class="mt-2"><i class="fas fa-bars fs-3"></i></div>
    <div class="py-2 d-flex flex-wrap justify-content-between">
        <h3>Articles</h3>
        <button class="btn btn-primary" id="post-btn"><i class="fas fa-plus"></i> New Post</button>
    </div>
    <form class="d-flex" action="/admin-panel/articles/search">
        <input class="form-control" type="text" name="query" placeholder="Search">
        <button class="btn btn-primary ms-2">Search</button>
    </form>
    @if (session("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>New Post Added!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session("info"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session("info") }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="py-2" id="post-view">
        <div class="row g-2 m-0">
            <?php foreach ($posts as $post) : ?>
                <?php
                $content = str_replace("\"", "\\\"", $post->content);
                $content = strip_tags($content);
                ?>
                <div onclick="location.href='/admin-panel/articles/<?= $post->id ?>'" class="col-12 col-md-6 col-lg-4 myCustom-card">
                    <div class="m-1 p-2">
                        <img class="border rounded" src="{{ URL("storage/post_images/".$post->image) }}" alt="">
                        <h6 class="mt-2"><b><?= $post->title ?></b></h6>
                        <div class="text-muted d-flex justify-content-between"><?= $post->created_at ?> <span class="text-end"><?= $post->view_count ?> <i class="fa fa-eye"></i></span></div>
                        <div class="myCustom-text mt-2">
                            <?= mb_strimwidth($content, 0, 100, '...', 'utf-8') ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="py-2 d-none" id="post-form">
        <span id="error" class="text-danger"></span>
        <form action="" id="post-form-validation" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="form-control mb-2" id="title" type="text" name="title" placeholder="Title Here....">
            <select class="form-select mb-2" name="category_id" id="category">
                @if (isset($categories))
                <option selected value="">Select Category....</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category->id ?>"> <?= $category->name ?> </option>
                <?php endforeach; ?>
                @else
                <option value="<?= $category->id ?>"> <?= $category->name ?> </option>
                @endif
            </select>
            <input type="file" name="image" id="image" class="form-control mb-2" accept="image/gif, image/jpeg, image/png">
            <textarea class="form-control" name="content" id="editor" cols="30" rows="10"></textarea>
            <button class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset("packages/my_ckeditor/build/ckeditor.js") }}"></script>
<script>
    ClassicEditor.contentsCss = "css/content.css";
    // ClassicEditor.allowedContent = true;
    ClassicEditor.create(document.querySelector("#editor"), {
        // plugin: ['Image', 'ImageToolbar', 'ImageCaption', 'ImageStyle', 'ImageResize', 'SimpleImageUploader', ],
        plugin: ['ImageResizeEditing', 'ImageResizeHandles', 'SimpleImageUploader'],
        simpleUpload: {
            uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        },
        mediaEmbed: {
            previewsInData:true,
            // elementName: 'o-embed',
        },
        image: {
            resizeOptions: [
                {
                    name: 'resizeImage:original',
                    value: null,
                    label: 'Original'
                },
                {
                    name: 'resizeImage:20',
                    value: '20',
                    label: '20%'
                },
                {
                    name: 'resizeImage:40',
                    value: '40',
                    label: '40%'
                },
                {
                    name: 'resizeImage:60',
                    value: '60',
                    label: '60%'
                },
                {
                    name: 'resizeImage:80',
                    value: '80',
                    label: '80%'
                },
                {
                    name: 'resizeImage:100',
                    value: '100',
                    label: '100%'
                },
            ],
            toolbar: [ 'imageStyle:alignBlockRight', 'imageStyle:alignCenter', 'imageStyle:alignBlockLeft', '|', 'toggleImageCaption', 'imageTextAlternative', 'resizeImage']
        },
        // fontSize: {
        //     options: [
        //         9,
        //         11,
        //         13,
        //         'default',
        //         17,
        //         19,
        //         21,
        //         23,
        //     ]
        // },
    });

    const postView = document.querySelector("#post-view");
    const postForm = document.querySelector("#post-form");
    const postBtn = document.querySelector("#post-btn");
    postBtn.addEventListener("click", function(e) {
        e.preventDefault();
        if (!postView.classList.contains("d-none") && postForm.classList.contains("d-none")) {
            postView.classList.add("d-none");
            postForm.classList.remove("d-none");
        } else {
            postView.classList.remove("d-none");
            postForm.classList.add("d-none");
        }
    });

    const postFormValidation = document.querySelector("#post-form-validation");
    const title = document.querySelector("#title");
    const category = document.querySelector("#category");
    const content = document.querySelector("#editor");
    const image = document.querySelector("#image");

    postFormValidation.addEventListener("submit", function(e) {
        e.preventDefault();
        if (!title.value.trim() || !category.value.trim() || !content.value.trim() || !image.value) {
            document.querySelector("#error").textContent = "all field required!";
        } else {
            document.querySelector("#error").textContent = "";
            this.submit();
        }
        // console.log(category.value.trim(), content.value.trim());
    })
</script>
@endsection