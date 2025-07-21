<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Wallet;
use Illuminate\Support\Carbon;
use App\Services\BillsService;

class BillController extends Controller
{
    protected $billssService;

    public function __construct(BillsService $billssService)
    {
        $this->billssService = $billssService;
    }
    public function create(Request $request){
        $this->billssService->create($request->from,$request->amount);
        return redirect('/home');
    }
    public function getOwned()
    {
        return $this->billssService->getOwned();
    }
    public function getTo(){
        return $this->billssService->getTo();

    }
    public function update($id){
        $this->billssService->update($id);
    }
}
