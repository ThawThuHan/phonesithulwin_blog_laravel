@extends('layouts.admin_panel_master')

@section('title', 'Articles')

@section('style')
<style>
    .myCustom-card img {
        width: 100%;
        height: 150px;
        /* background-color: darkslateblue; */
    }
</style>
@endsection
    
@section('content')
<div class="col-10 px-2">
    <div class="py-2 d-flex flex-wrap justify-content-between">
        <h3>Articles</h3>
        <form class="d-flex" action="">
            <input class="form-control" type="text" placeholder="Search">
            <button class="btn btn-primary ms-2">Search</button>
        </form>
    </div>
    <button class="btn btn-primary" id="post-btn"><i class="fas fa-plus"></i> New Post</button>
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
                <div onclick="location.href='/admin-panel/articles/<?= $post->id ?>'" class="col-12 col-md-6 col-lg-3 myCustom-card p-3 border rounded">
                    <img class="rounded" src="{{ URL("storage/post_images/".$post->image) }}" alt="">
                    <h6 class="mt-2"><b><?= $post->title ?></b></h6>
                    <div class="text-muted d-flex justify-content-between"><?= $post->created_at ?> <span class="text-end"><?= $post->view_count ?> <i class="fa fa-eye"></i></span></div>
                    <div class="myCustom-text">
                        <?= mb_strimwidth($content, 0, 100, '...', 'utf-8') ?>
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
<script src="{{ asset("packages/ckeditor5-cs/build/ckeditor.js") }}"></script>
<script>
    ClassicEditor.create(document.querySelector("#editor"), {
        // plugin: ['Image', 'ImageToolbar', 'ImageCaption', 'ImageStyle', 'ImageResize', 'SimpleImageUploader', ],
        plugin: ['ImageResizeEditing', 'ImageResizeHandles', 'SimpleImageUploader'],
        simpleUpload: {
            uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        }
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