<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

// Halaman Home
Route::get('/', function () {
    return view('home');
});

// Halaman Posts (dari modul)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// TUGAS: Halaman Categories
Route::get('/categories', function () {
    return view('categories', [
        'categories' => Category::all()
    ]);
});

// Halaman Blog, Contact, About (latihan modul sebelumnya)
Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});
