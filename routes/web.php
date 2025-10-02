<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->middleware('guest');

Route::post('/post_login', [UserController::class, 'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store']);

Route::post('/blogs/{blog:slug}/subscribe', [BlogController::class, 'subscribeHandler']);

Route::get('/blog/admin/create',[BlogController::class, 'create'])->middleware('admin');

Route::post('/blog/admin/store',[BlogController::class, 'store'])->middleware('admin');

Route::delete('/blog/{blog:id}/destroy',[BlogController::class, 'destroy'])->middleware('admin');


