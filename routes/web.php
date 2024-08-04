<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Post
Route::get('/', [PostController::class, 'index']);
Route::post('/post/add', [PostController::class, 'store'])->middleware('auth');
Route::get('/post/edit/{id}', [PostController::class, 'edit', 'id'])->middleware('auth');
Route::put('/post/edit/{id}', [PostController::class, 'update', 'id'])->middleware('auth');
// Registration
Route::get('/register', [RegistrationController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->middleware('guest');
// Session
Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::delete('/logout', [SessionController::class, 'destroy']);
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

