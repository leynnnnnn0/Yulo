<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('post.index');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', [RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);
