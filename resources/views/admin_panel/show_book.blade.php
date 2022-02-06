@extends('layouts.admin_panel_master')

@section('content')
<div class="col-10 p-2">
    <h3>Editing Book</h3>
    <a href="{{ route('admin_panel.books') }}">
        <--- Back</a>
            <!-- form -->
            <div class="py-2" id="post-form">
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ session('error') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Book Title:</label>
                        <input class="form-control" id="title" type="text" name="title" value="<?= $book->name ?>" placeholder="Enter your book title...">
                        <div class="invalid-feedback">required!</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input class="form-control" id="price" type="text" name="price" value="<?= $book->price ?>" placeholder="Price for book...">
                        <div class="invalid-feedback">required!</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="features" class="form-label">Features:</label>
                        <input type="text" name="features" id="features" class="form-control" placeholder="Features of your book..." value="<?= $book->features ?>">
                        <div class="invalid-feedback">required!</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="released_date" class="form-label">Released date:</label>
                        <input type="date" name="release_date" id="released_date" class="form-control" value="<?= $book->release_date ?>">
                        <div class="invalid-feedback">required!</div>
                    </div>

                    <?php $image_list = json_decode($book->images); ?>
                    <div class="d-flex flex-wrap justify-content-evenly">
                    @foreach ($image_list as $image)
                        <img class="mb-2" src="{{ asset("storage/book_images/".$image) }}" alt="" style="width: 200px;">
                    @endforeach
                    </div>
                    <input type="hidden" name="old_images" value='<?= $book->images ?>'>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Book cover & preview:</label>
                        <input type="file" name="images[]" id="image" class="form-control" accept="image/gif, image/jpeg, image/png" multiple>
                        <div class="invalid-feedback">required!</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="content" class="form-label">Preview content:</label>
                        <textarea class="form-control" name="preview_content" id="content" cols="30" rows="10" placeholder="Say something about your book..."><?= $book->preview_content ?></textarea>
                        <div class="invalid-feedback">required!</div>
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">Done</button>
                     <a class="btn btn-danger mt-2"
                        onclick="event.preventDefault(); document.querySelector('#delete').submit();">
                        Delete
                    </a>
                </form>
                <form id="delete" action="{{ route('book.delete', ['id' => $book->id]) }}" method="POST">
                    @csrf
                </form>
            </div>
</div>
@endsection