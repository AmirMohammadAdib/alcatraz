<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\AccountGun;
use App\Models\AccountOrder;
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
        if($account->status == 1){
            if(auth()->check()){
                $orderCheck = AccountOrder::where('user_id', auth()->user()->id)->where('account_id', $account->id)->where('status', 1)->first();
                if($orderCheck == null){
                    abort(404);
                }else{
                    return view('app.account', compact('account'));
                }
            }else{
                abort(404);
            }
        }
        return view('app.account', compact('account'));
    }

    public function accountStore(Request $request, Account $account){
        if(!auth()->check()){
            abort(403);
        }
        $user = auth()->user();

        if($account->status == 1){
            $inputs = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            AccountOrder::where('account_id', $account->id)->first()->update($inputs);
            return redirect()->route('app.index')->with('success', 'درخواست شما با موفقیت ثبت شد');
        }else{
            $walletSum = intval($user->wallet);
            
            if(intval($account->price) <= $walletSum){
                AccountOrder::create([
                    'user_id' => $user->id,
                    'account_id' => $account->id,
                    'status' => 1,
                ]); 
    
                $account->update(['status' => 1]);
                $user->update(['wallet' => $walletSum - intval($account->price)]);
    
                return redirect()->route('shop.account.view', $account)->with('success', 'خرید حساب با موفقیت انجام شد، اطلاعات خود را بصورت صحیح وارد کنید');
            }else{
                $leftOver = intval($account->price) - $walletSum;
                return redirect()->route('wallet.view', ['deposit' => $leftOver, 'redirect' => url()->full()])->with('success', 'لطفا برای پرداخت اقدام کنید');
            }
        }
    }


}
