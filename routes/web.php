<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\{CommentController, HomeController, PostController, CategoryController};
use Illuminate\Support\Facades\Route;

//Add to Kernel RoutesMiddleware

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [HomeController::class, 'update'])->name('profile.update');
    Route::get('/profile/posts', [HomeController::class, 'posts'])->name('profile.posts');
    Route::get('/profile/comments', [HomeController::class, 'comments'])->name('profile.comments');
    Route::get('/profile/favorites', [HomeController::class, 'favorites'])->name('profile.favorite');
});

Route::get('/', [PostController::class, 'index'])->name('index');

Route::group(['prefix' => 'posts'], function () {
    Route::get('{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::delete('{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');
    Route::post('{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('{post}/comments/delete', [CommentController::class, 'destroy'])->name('comments.delete');
});



Route::get('categories/',[CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');


Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, "index"])->name('admin.index');
    Route::resource('posts', AdminPostController::class)->names('admin.posts');
    Route::resource('categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('tags', AdminTagController::class)->names('admin.tags');
});
