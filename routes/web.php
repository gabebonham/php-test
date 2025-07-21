<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\WalletController;

Route::get('/home', function (
    BillController $billController,
    WalletController $walletController,
    UserController $userController
) {
    $ownedBills = $billController->getOwned();
    $toBills = $billController->getTo();
    $wallet = $walletController->getByLogged();
    $users = $userController->getAll();

    return view('home', [
        'users' => $users,
        'ownedBills' => $ownedBills,
        'toBills' => $toBills,
        'wallet' => $wallet
    ]);
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
Route::get('/payed/{id}', function ($id, BillController $billController) {
    $billController->update($id);
    return view('payed', ['id' => $id]);
});
Route::post('/register', [UserController::class, 'create']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/bills', [BillController::class, 'create']);