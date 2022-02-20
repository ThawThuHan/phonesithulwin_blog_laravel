@extends('layouts.admin_panel_master')

@section('style')
<style>
    .book img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>    
@endsection

@section('content')
<div class="col-10 px-2">
    <div class="py-1 d-flex flex-wrap justify-content-between">
        <h3>Books</h3>
        {{-- <form class="d-flex" action="">
            <input class="form-control" type="text" placeholder="Search">
            <button class="btn btn-primary ms-2">Search</button>
        </form> --}}
    </div>
    <button class="btn btn-primary mb-3" id="post-btn"><i class="fas fa-plus"></i> New Book</button>
    @if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('info') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="py-2" id="post-view">
        <div class="row g-3">
            <?php foreach ($books as $book) : ?>
                <?php
                $images = json_decode($book->images);
                $image0 = $images[0];
                ?>
                <div onclick="location.href='/admin-panel/books/<?= $book->id ?>'" class="col-12 col-md-6">
                    <div class="card mb-3 mx-3 blogShadow" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 book">
                                <img src="{{ asset("storage/book_images/".$image0) }}" class="" alt="..." style="object-fit: cover; width: 100%; height: 280px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title d-inline"><b><?= $book->name ?></b></h5>
                                    <div class="float-end my-3"><?= $book->order_count ?><i class="fas fa-shopping-cart"></i></div>
                                    <p class="card-text mt-4 mb-2">
                                        <?= $book->preview_content ?>
                                    </p>
                                    <span class="float-start my-3 text-danger"><?= $book->price ?></span>
                                    <span class="float-end my-3"><?= $book->created_at ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- form -->
    <div class="py-2 d-none" id="post-form">
        <form action="" method="POST" enctype="multipart/form-data" class="needs-validation col-12 col-md-6" novalidate>
            @csrf
            <div class="form-group mb-3">
                <label for="title" class="form-label">Book Title:</label>
                <input class="form-control" id="title" type="text" name="title" placeholder="Enter your book title...." required>
                <div class="invalid-feedback">required!</div>
            </div>
            <div class="form-group mb-3">
                <label for="price" class="form-label">Price:</label>
                <div class="input-group">
                    <input class="form-control" id="price" type="number" name="price" placeholder="Price for book..." required>
                    <span class="input-group-text">Ks</span>
                </div>
                <div class="invalid-feedback">required!</div>
            </div>
            <div class="form-group mb-3">
                <label for="features" class="form-label">Features:</label>
                <input type="text" name="features" id="features" class="form-control" placeholder="Features of your book..." required>
                <div class="invalid-feedback">required!</div>
            </div>
            <div class="row mb-3">
                <div class="col form-group">
                    <label for="released_date" class="form-label">Released date:</label>
                    <input type="date" name="release_date" id="release_date" class="form-control" required>
                    <div class="invalid-feedback">required!</div>
                </div>
                <div class="col form-group">
                    <label for="available" class="form-label">Available</label>
                    <select class="form-select" name="available" id="available">
                        <option value="1">yes</option>
                        <option value="0">no</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="image" class="form-label">Book cover & preview:</label>
                <input type="file" name="images[]" id="image" class="form-control" accept="image/*" multiple required>
                <div class="invalid-feedback">required!</div>
            </div>
            <div class="form-group mb-3">
                <label for="content" class="form-label">Preview content:</label>
                <textarea class="form-control" name="preview_content" id="content" cols="30" rows="10" required placeholder="Say something about your book..."></textarea>
                <div class="invalid-feedback">required!</div>
            </div>
            <button class="btn btn-primary ms-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
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

    // form validation
    (function() {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection