<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\WalletController;

Route::get('/home', function () {
    $userController = new UserController();
    $billController = new BillController($userController);
    $walletController = new WalletController();
    $ownedBills = $billController->getOwned();
    $toBills = $billController->getTo();
    $wallet = $walletController->getByLogged();
    return view('home', ['users'=>$userController->getAll(),
    'ownedBills'=>$ownedBills,
    'toBills'=>$toBills,
    'wallet'=>$wallet]);
});
Route::get('/auth/signup', function () {
    return view('auth.signup');
});
Route::get('/auth/login', function () {
    return view('auth.login');
});
Route::get('/billing/{id}', function ($id) {
    return view('billing', ['id'=>$id]);
});
Route::get('/payed/{id}', function ($id) {
    $userController = new UserController();
    $billController = new BillController($userController);
    $billController->update($id);
    return view('payed', ['id'=>$id]);
});
Route::post('/register', [UserController::class, 'create']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/bills', [BillController::class, 'create']);