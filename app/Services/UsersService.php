<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UsersService {
    public function logout(){
        Auth::logout();
        return view('home');
    }
    public function login(string $email, string $password, Request $request) 
    {
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return true;
        }
 
        return false;
    }
    public function create(string $name,string $email,string $password){
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        Wallet::create(['owner'=>$user->id,'value'=>10.0]);
        return true;
    }
    public function getAll(){
        $excludedId = Auth::id();
        return User::where('id', '!=', $excludedId)->get();
    }
    public function getById($id){
        return User::find($id);
    }
}