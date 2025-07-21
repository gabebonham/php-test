<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class WalletsService {
    public function create(string $id){
        return Wallet::create(['owner'=>$id,'value'=>10.0]);
    }
    public function getByLogged(){
        if (Auth::check()){
            $id = Auth::id();
            return Wallet::where('owner', $id)->first();
        } else {
            return;
        }
        
    }
}