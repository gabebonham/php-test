<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function create(Request $req){
        return Wallet::create(['owner'=>$req->owner,'value'=>10.0]);
    }
    public function getByLogged(){
        if (auth()->check()){
            $id = auth()->id();
            return Wallet::where('owner', $id)->first();
        } else {
            return;
        }
        
    }
    
}
