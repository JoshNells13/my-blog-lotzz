<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'ProccessLogin'])->name('process.login');

//Home Route
Route::get('/blogs/{slug}', [HomeController::class, 'showBlog'])->name('home.blog.show');
Route::get('/categories/{slug}', [HomeController::class, 'showCategory'])->name('home.category.show');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');


//Routes Autentikasi Untuk Admin
Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    //Bagian Admin Blog
    Route::prefix('/admin')->name('admin.')->group(function () {

    //CRUD Blog
     Route::resource('blogs', BlogController::class);

     //CRUD Category
     Route::resource('categories', CategoryController::class);


    });
});
