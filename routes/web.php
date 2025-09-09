<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Page\MainController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


//Admin panel login register start
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//Admin panel login register end


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/',[AdminController::class, 'superAdmin'])->name('superAdmin.dashboard');
    Route::get('/admin',[AdminController::class, 'admin'])->name('admins.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('contacts', ContactController::class);
});

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/blogs', [MainController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [MainController::class, 'singleBlog'])->name('single.blog');
Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/product/{slug}', [MainController::class, 'singleProduct'])->name('single.product');
Route::get('/category/{slug}', [MainController::class, 'categoryProduct'])->name('category.product');
Route::get('locale/{lang}',[LanguageController::class, 'setLocale']);
Route::post('/order-store',[OrderController::class, 'order'])->name('order.store');



// web.php
// routes/web.php
Route::get('/test', [TestController::class, 'test']);
Route::post('/tests', [TestController::class, 'store']);



