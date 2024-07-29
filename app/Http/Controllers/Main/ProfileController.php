<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\BuyAccount;
use App\Models\Player;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView(){
        $winGames = Player::where('user_id', auth()->user()->id)->where('status', 1)->count();
        $totalGames = Player::where('user_id', auth()->user()->id)->count();
        $loseGames = Player::where('user_id', auth()->user()->id)->where('status', 0)->count();

        $myAccounts = BuyAccount::where('user_id', auth()->user()->id)->orderBy('created_at')->get();

        return view('app.profile', compact('winGames', 'totalGames', 'loseGames', 'myAccounts'));
    }

    public function profileUpdateView(){
        $user = auth()->user();
        return view('app.update-profile', compact('user'));
    }

    public function setEmailPass(Request $request, BuyAccount $account){
        $inputs = $request->validate([
            'email' => 'required|email|unique:buy_accounts,email',
            'password' => 'required|min:4',
        ]);
        if($account->email != null){
            return back()->with('error', 'برای این درخواست قبلا ایمیل و رمز عبور ثبت شده است');

        }
        $inputs['status'] = 2;

        $account->update($inputs);
        return back()->with('success', 'ایمیل و رمز عبور حساب شما با موفقیت ثبت شد, منتظر باشید');
        
    }

    

    public function profileUpdateUpdate(Request $request){
        $inputs = $request->validate([
            'phone' => 'required|string|max:11|min:11|unique:users,phone,' . auth()->user()->id,
            'username' => 'required|string|max:255||unique:users,username,' . auth()->user()->id,
            'cart_number' => 'required|string|max:255|max:16|min:16',
            'shabba_number' => 'required|string|max:255|max:24|min:24'
        ]);



        auth()->user()->update($inputs);
        return back()->with('success', 'حساب کاربری شما با موفقیت ویرایش شد');
        
    }

    
}
