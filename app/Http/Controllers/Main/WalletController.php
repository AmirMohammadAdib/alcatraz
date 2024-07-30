<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function walletView(){
        $user = auth()->user();
        $deposits = Deposit::where('user_id', $user->id)
        ->select('status', 'amount', 'created_at', DB::raw('"deposit" as type'));
    
        $withdraws = Withdraw::where('user_id', $user->id)
            ->select('status' ,'amount', 'created_at', DB::raw('"withdraw" as type'));
        
        $transactions = $deposits->union($withdraws)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('app.my-wallet', compact('user', 'transactions'));
    }
}
