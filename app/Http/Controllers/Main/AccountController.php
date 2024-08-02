<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function accountRequestView(){
        $accounts = Account::where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('app.account-request', compact('accounts'));
    }


    public function shopView(){
        $accounts = Account::where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('app.accounts', compact('accounts'));
    }


    public function accountView(){
        $accounts = Account::where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('app.accounts', compact('accounts'));
    }


}
