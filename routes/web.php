<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CandidantController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Page\MainController;
use Illuminate\Support\Facades\Route;


//Admin panel login register start
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//Admin panel login register end


Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/',[AdminController::class, 'superAdmin'])->name('superAdmin.dashboard');
    Route::get('/admin',[AdminController::class, 'admin'])->name('admins.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('news', NewsController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('vacancies', VacancyController::class);
    Route::resource('candidants', CandidantController::class);
});

Route::get('/', [MainController::class, 'home'])->name('home');
