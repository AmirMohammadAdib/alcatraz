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


    public function deposite(Request $request){
        $inputs = $request->validate([
            'amount' => 'required|numeric|min:1000',
        ]);

        //getway
    }

    public function withdraw(Request $request){
        $inputs = $request->validate([
            'amount' => 'required|numeric|min:1000',
        ]);

        //checking on wallet
        $walletAmount = intval(auth()->user()->wallet);
        if($inputs['amount'] <= $walletAmount){ 
            if(auth()->user()->cart_number == null){
                return back()->with('error', 'ابتدا اطلاعات مالی خود را تکمیل کنید');
                exit;
            }

            $inputs['user_id'] = auth()->user()->id;
            Withdraw::create($inputs);

            $user = auth()->user();
            $user->wallet = intval(auth()->user()->wallet) - intval($inputs['amount']);
            $user->save();

            return back()->with('success', 'درخواست برداشت با موفقیت ثبت شد');

        }else{
            return back()->with('error', 'مبلغ درخواستی شما بیشتر از حد کیف پول شماست');
        }
    }

    public function transport(Request $request){
        $inputs = $request->validate([
            'amount' => 'required|numeric|min:1000',
        ]);

        
    }
}
