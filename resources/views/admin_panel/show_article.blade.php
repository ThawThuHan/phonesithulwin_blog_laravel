@extends('layouts.admin_panel_master')

@section('title', 'Article')

@section('content')

<div class="col-10 p-2">
    <h3>Editing Article</h3>
    @if (session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Something Wrong!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Post Updated!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <button onclick="event.preventDefault(); history.back();" class="btn btn-sm btn-secondary">
        <--- Back</button>
            <div class="py-2" id="post-form">
                <span id="error" class="text-danger"></span>
                <form action="" id="post-form-validation" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control mb-2" id="title" type="text" name="title" value="<?= $post->title ?>" placeholder="Title Here....">
                    <img class="mb-2" src="{{ URL("storage/post_images/".$post->image) }}" alt="" style="width: 200px;">
                    <input type="hidden" name="old_image" value="<?= $post->image ?>">
                    <select class="form-select mb-2" name="category_id" id="category">
                        <option value="">Select Category....</option>
                        <?php foreach ($categories as $category) : ?>
                            <?php if ($post->category_id == $category->id) : ?>
                                <option selected value="<?= $category->id ?>"> <?= $category->name ?> </option>
                            <?php else : ?>
                                <option value="<?= $category->id ?>"> <?= $category->name ?> </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <input type="file" name="image" class="form-control mb-2" accept="image/gif, image/jpeg, image/png">
                    <textarea class="form-control" name="content" id="editor" cols="30" rows="10"><?= $post->content ?></textarea>
                    <button class="btn btn-primary mt-2">Done</button>
                    <a class="btn btn-danger mt-2"
                        onclick="event.preventDefault(); document.querySelector('#delete').submit();">
                        Delete
                    </a>
                </form>
                <form id="delete" action="{{ route('article.delete', ['id' => $post->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="previous_route" value="{{$previous_route}}">
                </form>
            </div>
</div>
@endsection

@section('script')
<script src="{{ asset("packages/my_ckeditor/build/ckeditor.js") }}"></script>
<script>
    ClassicEditor.contentsCss = "./public/css/content.css";
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
</script>
@endsection