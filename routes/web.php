<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/home', function () {
    return view('home');
});
Route::get('/auth/signup', function () {
    return view('auth/signup');
});
Route::post('/register', [UserController::class, 'create']);
Route::post('/logout', [UserController::class, 'logout']);