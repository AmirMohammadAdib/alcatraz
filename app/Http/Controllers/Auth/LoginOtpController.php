<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginOtpController extends Controller
{
    public function view(){
        return view('auth.login-otp');
    }

    public function store(Request $request){
        $inputs = $request->validate([
            'phone' => 'required|min:10|max:10'
        ]);
        $phone = $inputs['phone'];

        $user = User::where('phone', $phone)->first();
        if($user == null){
            $user = User::create([
                'phone' => $phone,
                'profile' => rand(1,4) . '.png',
            ]);
        }

        //create otp code
        $otpCode = rand(1000, 9999);
        $token = Str::random(60);
        $otpInputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'login_id' => $phone,
            'type' => 0,
        ];

        Otp::create($otpInputs);
        //send sms 

        
        return redirect()->route('confirm.view', $token);

    }

    public function loginResendOtp($token){
        $otp = Otp::where('token', $token)->first();

        if(empty($otp))
        {
            return back()->with('error', 'آدرس وارد شده نامعتبر میباشد');
        }




        $user = $otp->user()->first();
         //create otp code
         $otpCode = rand(1000, 9999);
         $token = Str::random(60);
         $otpInputs = [
             'token' => $token,
             'user_id' => $user->id,
             'otp_code' => $otpCode,
             'login_id' => $otp->login_id,
             'type' => $otp->type,
         ]; 

         Otp::create($otpInputs);
         //send sms or email
        
         return redirect()->route('confirm.view', $token);
    }



    public function confirmView($token){
        $otp = Otp::where('token', $token)->first();
        if(empty($otp))
        {
            return redirect()->route('login.otp.view')->with('error', 'آدرس وارد شده نامعتبر میباشد');
        }

        return view('auth.confirm', compact('token', 'otp'));

    }


    public function confirmStore(Request $request, $token){
        $inputs = $request->validate([
            'otp' => 'required|array|min:4|max:4',
        ]);

        $otpCode = '';
        foreach($inputs['otp'] as $code){
            if($code != null){
                $otpCode .= $code;
            }else{
                return back()->with('error', 'لطفا کد را بصورت صحیح وارد کنید');
            }
        }

        $otp = Otp::where('token', $token)->where('used', 0)->where('created_at', '>=', Carbon::now()->subMinute(3)->toDateTimeString())->first();
       if(empty($otp))
       {
        return back()->with('error', 'آدرس وارد شده نامعتبر میباشد');
       }

       //if otp not match
       if($otp->otp_code !== $otpCode)
       {
        return back()->with('error', 'کد وارد شده صحیح نمیباشد');
       }

       // if everything is ok :
        $otp->update(['used' => 1]);
        $user = $otp->user()->first();

        Auth::login($user);
        return redirect()->route('app.index');
    }
}
