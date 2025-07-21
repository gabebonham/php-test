<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Wallet;
use Illuminate\Support\Carbon;
class BillController extends Controller
{
    protected $userController;

    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }
    public function create(Request $request){
        $loggedUserId = auth()->id();
        $uuid = Str::uuid(); 
        $uuidString = Str::uuid()->toString(); 
        $expiresAt = Carbon::now()->addMinute();
        $bill = Bill::create([
            'to' => $request->from,
            'from' => $loggedUserId,
            'amount' => $request->amount,
            'status' => 'pendente',
            'pixKey' => $uuidString,
            'exp' => $expiresAt,
        ]);
        
        
        return redirect('/home');
    }
    public function getOwned()
    {
        $userId = auth()->id();
        
        return Bill::where('from', $userId)
                    ->with('fromUser')
                    ->get();
    }
    public function getTo(){
        $userId = auth()->id();
         return Bill::where('to', $userId)
                    ->with('toUser')
               ->get();
    }
    public function update($id){
        $bill = Bill::find($id);
        $bill->status = 'pago';
        $bill->save();
        $loggedUserId = $bill->to;
        $from = $bill->from;
        $amount = $bill->amount;
        $loggedUserId = auth()->id();
        $towallet = Wallet::where('owner', $loggedUserId)
               ->first();
        $towallet->value = $towallet->value-$amount;
        $towallet->save(); 

        $fromwallet = Wallet::where('owner', $from)
               ->first();
        $fromwallet->value = $fromwallet->value+$amount;
        $fromwallet->save();
    }
}
