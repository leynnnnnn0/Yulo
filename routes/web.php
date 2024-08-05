<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserSharedPostController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

// Post
Route::get('/', [PostController::class, 'index']);
Route::post('/post/add', [PostController::class, 'store'])->middleware('auth');
Route::get('/post/edit/{id}', [PostController::class, 'edit', 'id'])->middleware('auth');
Route::put('/post/edit/{id}', [PostController::class, 'update', 'id'])->middleware('auth');
Route::delete('/delete/delete/{id}', [PostController::class, 'destroy', 'id'])->middleware('auth');
// Vote
Route::post('/vote', [VoteController::class, 'store'])->middleware('auth');
// Share
Route::post('/share', [UserSharedPostController::class, 'store'])->middleware('auth');
// Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
// Comment
Route::post('/comment/add', [CommentController::class, 'store'])->middleware('auth');
Route::delete('/comment/delete', [CommentController::class, 'destroy'])->middleware('auth');
// Registration
Route::get('/register', [RegistrationController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->middleware('guest');
// Session
Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::delete('/logout', [SessionController::class, 'destroy']);
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

