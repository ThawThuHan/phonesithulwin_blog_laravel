@extends('layouts/master')

@section('title', "Categories")

@section('css')
    <link rel="stylesheet" href="css/categories.css">
@endsection

@section('content')
<div class="container mt-3">
    <h2 class="mb-4 sub-title">Categories</h2>
    <div class="row mb-4">
        <?php foreach ($categories as $category) : ?>
            
            <div onclick="location.href='/categories/{{ $category->id }}/posts'" class="col-12 col-md-6 col-lg-3 mb-3" style="position: relative;">
                <strong style="position: absolute; right: 15px;"><?= count($category->posts) ?> posts</strong>
                <img src="{{ asset("storage/category_images/".$category->image) }}" class="" alt="..." style="opacity: 0.2; width: 100%; height: 200px; object-fit: cover; box-shadow: 0px 0px 5px black;">
                <strong class="" style="position: absolute; top: 100px; left: 150px; transform: translate(-50%, -25%);"><?= $category->name; ?></strong>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- <div onclick="location.href='articles.php'" class="col-12 col-md-6 col-lg-3 mb-3" style="position: relative;">
        <b style="position: absolute; right: 0%;">3 posts</b>
        <img src="assets/images/stress.jpg" class="" alt="..." style="opacity: 0.6; width: 100%; height: 200px; object-fit: cover; box-shadow: 0px 0px 5px black;">
        <strong class="" style="position: absolute; top: 100px; left: 150px; transform: translate(-50%, -25%);">Title</strong>
            
    </div> -->
</div>
@endsection