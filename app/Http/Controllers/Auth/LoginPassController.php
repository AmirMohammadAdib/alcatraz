<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPassController extends Controller
{
    public function view(){
        return view('auth.login-pass');
    }

    public function store(Request $request){
        $inputs = $request->validate([
            'phone' => 'required|min:10|max:10',
            'password' => 'required|min:6|max:12'
        ]);
        $phone = '9' . $inputs['phone'];

        $user = User::where('phone', $phone)->first();
        if($user == null){
            return back()->with('error', 'شماره تماس وارد شده فاقد حساب کاربریست، از قسمت کد یکبار مصرف اقدام کنید');
        }



        if($user->password == null){
            return back()->with('error', 'از قسمت کد یکبار مصرف اقدام کنید');
            exit;
        }

        if(Auth::attempt([
            'phone' => $phone,
            'password' => $inputs['password']
        ])){
            return redirect()->route('app.index');
        }else{
            return back()->with('error', 'رمز عبور یا شماره تماس اشتباه است');
            exit;
        }
    }
}
