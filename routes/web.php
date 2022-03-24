<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Facebook\Facebook;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/posts/{id}', [HomeController::class, 'post']);
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/about', fn () => view('about'));

Route::get('/categories', [HomeController::class, 'categories']);
Route::get('/categories/{id}/posts', [HomeController::class, 'postsByCategory']);

Route::get('/contact', fn () => view('contact'));
Route::post('/contact', [ContactController::class, 'send']);

Route::get('/book/{id}/order', [OrderController::class, "index"]);
Route::post('/book/{id}/order', [OrderController::class, "create"]);

Route::get('/phone-stl', [LoginController::class, "showLoginForm"]);
Route::post('/phone-stl', [LoginController::class, "login"])->name("new-login");

Route::get('/new-user', [RegisterController::class, "showRegistrationForm"]);
Route::post('/new-user', [RegisterController::class, "register"])->name("register");

Route::get('/t', function (Facebook $fb) {
    $fb->setDefaultAccessToken(config('facebook.access_token'));
    $respone = $fb->get('/me?fields=engagement,fan_count,followers_count,app_id,posts{shares}')->getGraphUser();
    dd($respone['engagement']['count']);
});


Route::middleware('auth')->group(function () {
    Route::get('/admin-panel', [CategoryController::class, "getAll"]);
    Route::get('/admin-panel/categories/{id?}', [CategoryController::class, "getAll"])->name("admin_panel");
    Route::post('/admin-panel/categories', [CategoryController::class, "create"]);
    Route::post('/admin-panel/categories/update/{id}', [CategoryController::class, "update"]);
    Route::get('/admin-panel/categories/delete/{id}', [CategoryController::class, "delete"]);

    Route::get('/admin-panel/categories/{id}/articles', [CategoryController::class, "getPostByCategory"])->name(("admin_panel.category.articles"));
    Route::post('/admin-panel/categories/{id}/articles', [PostController::class, "create"]);

    Route::get('/admin-panel/articles', [PostController::class, "getAll"])->name("admin_panel.articles");
    Route::get('/admin-panel/articles/search', [PostController::class, "search"]);
    Route::post('/admin-panel/articles', [PostController::class, "create"]);
    Route::post('/ckeditor/upload', [CkeditorController::class, "upload"])->name('ckeditor.upload');
    Route::get('/admin-panel/articles/{id}', [PostController::class, "get"]);
    Route::post('/admin-panel/articles/{id}', [PostController::class, "update"]);
    Route::delete('/admin-panel/articles/{id}', [PostController::class, "delete"])->name('article.delete');

    Route::get('/admin-panel/books', [BookController::class, "getAll"])->name('admin_panel.books');
    Route::post('/admin-panel/books', [BookController::class, "create"]);
    Route::get('/admin-panel/books/{id}', [BookController::class, "get"]);
    Route::post('/admin-panel/books/{id}', [BookController::class, "update"]);
    Route::post('/admin-panel/books/delete/{id}', [BookController::class, "delete"])->name('book.delete');

    Route::get('/admin-panel/orders', [OrderController::class, "getAll"])->name('admin_panel.orders');
    Route::get('/admin-panel/orders/{id}/confirm', [OrderController::class, "confirm"]);
    Route::post('/admin-panel/orders/{id}/confirm', [OrderController::class, "cancel"]);
});

Auth::routes(
    [
        "login" => false,
        "register" => false,
    ]
);
