<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Services\WalletsService;

class WalletController extends Controller
{
    protected $walletService;

    public function __construct(WalletsService $walletService)
    {
        $this->walletService = $walletService;
    }
    public function create(Request $req){
        return $this->walletService->create($req->owner);
    }
    public function getByLogged(){
        return $this->walletService->getByLogged();
    }
    
}
