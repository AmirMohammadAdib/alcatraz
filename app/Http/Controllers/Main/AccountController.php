<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\AccountGun;
use App\Models\Gun;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function accountRequestView(){
        $accounts = Account::where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('app.account-request', compact('accounts'));
    }


    public function shopView(){
        $accounts = Account::where('status', 0);

        if(isset($_GET['sort'])){
            if($_GET['sort'] == 'expensive'){
                $accounts = $accounts->orderBy('price', 'desc');
            }elseif($_GET['sort'] == 'cheapest'){
                $accounts = $accounts->orderBy('price', 'asc');
            }elseif($_GET['sort'] == 'old'){
                $accounts = $accounts->orderBy('created_at', 'asc');
            }elseif($_GET['sort'] == 'new'){
                $accounts = $accounts->orderBy('created_at', 'desc');
            }
        }

        if(isset($_GET['guns'])){
            $accountGun = AccountGun::whereIn('gun_id', $_GET['guns'])->pluck('account_id')->toArray();
            $accounts = $accounts->whereIn('id', $accountGun);
        }

        $accounts = $accounts->get();
                
        $guns = Gun::all();
        return view('app.accounts', compact('accounts', 'guns'));
    }


    public function accountView(Account $account){
                return view('app.account', compact('account'));
    }

    public function accountStore(Account $account){
        if(!auth()->check()){
            abort(403);
        }

        $user = auth()->user();

        $walletSum = intval($user->wallet) + intval($user->award_wallet);
        
        if(intval($account->price) <= $walletSum){
            
        }else{
            $leftOver = intval($account->price) - $walletSum;
            return redirect()->route('wallet.view', ['deposit' => $leftOver]);
        }
    }


}
