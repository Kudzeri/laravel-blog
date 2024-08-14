<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Add to Kernel RoutesMiddleware

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, "index"])->name('admin.index');
    Route::resource('posts', AdminPostController::class)->names('admin.posts');
    Route::resource('categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('tags', AdminTagController::class)->names('admin.tags');
});
