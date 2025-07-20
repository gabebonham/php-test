<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $req){
        $user = User::create($req);
        auth()->login($user);
        return 'crate';
    }
    public function getAll():array{
        return User::getAll();
    }
}
