@extends('layouts.admin_panel_master')

@section('title', 'Categories')

@section('content')
    <div class="col-10 px-2">
        <div class="py-2">
            <h3>Categories</h3>
            <button class="btn btn-primary mt-2" id="new-category-btn"><i class="fas fa-plus"></i> new category</button>
        </div>
        <form id="new-category-form" class="col-6 py-2 d-none" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="form-control mb-2" type="text" id="category_name" name="category_name" placeholder="Category Name">
            <input type="file" name="image" class="form-control mb-2">
            <button class="btn btn-primary ms-1">Submit</button>
        </form>

        <?php if (isset($category) && $category != "") : ?>
            <form class="col-6 py-2" action="/admin-panel/categories/update/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control mb-2" type="text" id="category_name" name="category_name" placeholder="Category Name" value="{{ $category->name }}">
                <input type="file" name="image" class="form-control mb-2">
                <button class="btn btn-primary ms-1">Submit</button>
            </form>
        <?php endif; ?>

        @if(isset($error))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Something Wrong!</strong> Please try again.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <div class="text-danger" id="error"></div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Posts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <?php
                    // $posts_table = new Posts_Table($mysql);
                    // $posts = $posts_table->getByCategory($category->id);
                    $postCount = count($category->posts);
                    ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= $category->name ?></td>
                        <td><img src="{{ asset("storage/category_images/".$category->image) }}" alt="" style="width:80px; height:100px"></td>
                        <td><?= $postCount ?></td>
                        <td>
                            <a href="/admin-panel/categories/{{ $category->id }}/articles" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="/admin-panel/categories/<?= $category->id ?>" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                            <a href="/admin-panel/categories/delete/{{ $category->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        const newCategory = document.querySelector("#new-category-btn");
        const newCategoryForm = document.querySelector("#new-category-form");
        const newCategoryName = document.querySelector("#category_name");

        newCategory.addEventListener("click", function(e) {
            e.preventDefault();
            if (newCategoryForm.classList.contains("d-none")) {
                newCategoryForm.classList.remove("d-none");
            } else {
                newCategoryForm.classList.add("d-none");
            }
        });

        newCategoryForm.addEventListener("submit", function(e) {
            e.preventDefault();
            if (!newCategoryName.value.trim()) {
                document.querySelector("#error").textContent = "Category Name is required!";
            } else {
                document.querySelector("#error").textContent = "";
                this.submit();
            }
        })
    </script>
@endsection
