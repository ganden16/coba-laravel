<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCont;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'name' => 'Achmad Alvin Ardiansyah',
        'email' => 'Alvindian58@gmail.com',
        'image' => 'img/foto-profil.jpg'
    ]);
});
Route::get('/posts', [PostController::class, 'viewAllPost']);
Route::get('/posts/{post:slug}', [PostController::class, 'viewPost']);

Route::get('/categories', [CategoryCont::class, 'viewAllCat']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
