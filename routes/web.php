<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'ProccessLogin'])->name('process.login');

//Home Route
Route::get('/blogs/{slug}', [HomeController::class, 'showBlog'])->name('home.blog.show');
Route::get('/categories/{slug}', [HomeController::class, 'showCategory'])->name('home.category.show');


//Routes Autentikasi Untuk Admin
Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    //Bagian Admin Blog
    Route::prefix('/admin')->group(function () {

        //CRUD Blog
        Route::controller(BlogController::class)->group(function () {
            Route::get('/blogs', 'index')->name('admin.blogs.index');
            Route::get('/blogs/create', 'create')->name('admin.blogs.create');
            Route::post('/blogs', 'store')->name('admin.blogs.store');
            Route::get('/blogs/{id}/edit', 'edit')->name('admin.blogs.edit');
            Route::put('/blogs/{id}', 'update')->name('admin.blogs.update');
            Route::delete('/blogs/{id}', 'destroy')->name('admin.blogs.destroy');
        });

        //CRUD Category
        Route::controller(BlogController::class)->group(function () {
            Route::get('/categories', 'index')->name('admin.categories.index');
            Route::get('/categories/create', 'create')->name('admin.categories.create');
            Route::post('/categories', 'store')->name('admin.categories.store');
            Route::get('/categories/{id}/edit', 'edit')->name('admin.categories.edit');
            Route::put('/categories/{id}', 'update')->name('admin.categories.update');
            Route::delete('/categories/{id}', 'destroy')->name('admin.categories.destroy');
        });

    });
});
