<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
class BillsService {
    public function create($from,$amount){
        $loggedUserId = Auth::id();
        $uuid = Str::uuid(); 
        $uuidString = Str::uuid()->toString(); 
        $expiresAt = Carbon::now()->addMinute();
        $bill = Bill::create([
            'to' => $from,
            'from' => $loggedUserId,
            'amount' => $amount,
            'status' => 'pendente',
            'pixKey' => $uuidString,
            'exp' => $expiresAt,
        ]);
        
        
        return true;
    }
    public function getOwned()
    {
        $userId = Auth::id();

        
        return Bill::where('from', $userId)
                    ->with('fromUser')
                    ->get()
                    ->map(function($bill){
                        if($bill->status=='pendente'&&isset($bill->exp) && \Carbon\Carbon::parse($bill->exp)->isPast()){
                            $bill->status = 'expirado';
                        }
                        return $bill;
                    });
    }
    public function getTo(){
        $userId = Auth::id();
        return Bill::where('to', $userId)
                    ->with('toUser')
                    ->get()
                    ->map(function($bill){
                        if($bill->status=='pendente'&&isset($bill->exp) && \Carbon\Carbon::parse($bill->exp)->isPast()){
                            $bill->status = 'expirado';
                        }
                        return $bill;
                    });
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
        return true;
    }
}