<?php

/* use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
}); */


use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
Route::resource('categories', CategoryController::class);
Route::get('/', [PostController::class, 'index']);
Route::resource('posts', PostController::class);
Route::get('/category/{id}', [PostController::class, 'categoryPosts']);






