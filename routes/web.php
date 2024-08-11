<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PostController::class, 'index'])->name('index');
Route::resource('posts', PostController::class);
