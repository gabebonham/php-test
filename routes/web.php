<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/home', function () {
    $controller = new UserController();
    return view('home', ['users'=>$controller->getAll()]);
});
Route::get('/auth/signup', function () {
    return view('auth/signup');
});
Route::post('/register', [UserController::class, 'create']);
Route::post('/logout', [UserController::class, 'logout']);