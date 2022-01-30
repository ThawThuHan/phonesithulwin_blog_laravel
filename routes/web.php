<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
    Route::get('/admin-panel/{id?}', [CategoryController::class, "getAll"])->name("admin-panel");
    Route::post('/admin-panel', [CategoryController::class, "create"]);
    Route::post('/admin-panel/update/{id}', [CategoryController::class, "update"]);
    Route::get('/admin-panel/delete/{id}', [CategoryController::class, "delete"]);
});

Auth::routes(
    [
        "login" => false,
        "register" => false,
    ]
);
