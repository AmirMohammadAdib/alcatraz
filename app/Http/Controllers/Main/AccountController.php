<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function accountRequestView(){
        return view('app.account-request');
    }


    public function shopView(){
        return view('app.accounts');
    }


    public function accountView(){
        return view('app.account');
    }


}
