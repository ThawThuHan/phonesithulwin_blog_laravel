<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/about', fn () => view('about'));

Route::get('/categories', fn () => view('categories'));

Route::get('/contact', fn () => view('contact'));

Route::get('/phone-stl', [LoginController::class, "showLoginForm"]);
Route::post('/phone-stl', [LoginController::class, "login"])->name("new-login");

Route::get('/new-user', [RegisterController::class, "showRegistrationForm"]);
Route::post('/new-user', [RegisterController::class, "register"])->name("register");


Route::middleware('auth')->group(function () {
    Route::get('/admin-panel', [CategoryController::class, "getAll"]);
    Route::get('/admin-panel/categories/{id?}', [CategoryController::class, "getAll"])->name("admin_panel");
    Route::post('/admin-panel/categories', [CategoryController::class, "create"]);
    Route::post('/admin-panel/categories/update/{id}', [CategoryController::class, "update"]);
    Route::get('/admin-panel/categories/delete/{id}', [CategoryController::class, "delete"]);

    Route::get('/admin-panel/categories/{id}/articles', [CategoryController::class, "getByCategory"]);
    Route::post('/admin-panel/categories/{id}/articles', [PostController::class, "create"]);

    Route::get('/admin-panel/articles', [PostController::class, "getAll"])->name("admin_panel.articles");
    Route::post('/admin-panel/articles', [PostController::class, "create"]);
    Route::post('/ckeditor/upload', [CkeditorController::class, "upload"])->name('ckeditor.upload');
    Route::get('/admin-panel/articles/{id}', [PostController::class, "get"]);
    Route::post('/admin-panel/articles/{id}', [PostController::class, "update"]);
    Route::post('/admin-panel/articles/delete/{id}', [PostController::class, "delete"])->name('article.delete');
});

Auth::routes(
    [
        "login" => false,
        "register" => false,
    ]
);
