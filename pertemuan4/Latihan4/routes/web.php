<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController; // Pastikan controller ini di-import

Route::get('/', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/blog', function () { return view('blog'); });
Route::get('/contact', function () { return view('contact'); });

// --- Auth Routes ---
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --- Public Posts ---
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');
Route::get('/categories', function () { return view('categories', ['categories' => Category::all()]); });

// --- DASHBOARD ROUTES (TUGAS 1, 2, 3) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. Dashboard Posts
    Route::get('/dashboard', [DashboardPostController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [DashboardPostController::class, 'store'])->name('dashboard.store');
    
    // Route Tambahan untuk Edit, Update, Destroy
    Route::get('/dashboard/{post:slug}/edit', [DashboardPostController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{post:slug}', [DashboardPostController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{post:slug}', [DashboardPostController::class, 'destroy'])->name('dashboard.destroy');
    
    Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])->name('dashboard.show');

    // 2. Dashboard Categories (CRUD Resource)
    Route::resource('/dashboard/categories', AdminCategoryController::class)->except(['show']);
});