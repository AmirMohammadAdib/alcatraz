<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\BuyAccount;
use App\Models\CPOrder;
use App\Models\Player;
use App\Models\User;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView(){
        $winGames = Player::where('user_id', auth()->user()->id)->where('status', 1)->count();
        $totalGames = Player::where('user_id', auth()->user()->id)->count();
        $loseGames = Player::where('user_id', auth()->user()->id)->where('status', 0)->count();

        $myAccounts = BuyAccount::where('user_id', auth()->user()->id)->orderBy('created_at')->get();
        $cpOrders = CPOrder::where('user_id', auth()->user()->id)->orderBy('created_at')->get();
        return view('app.profile', compact('winGames', 'totalGames', 'loseGames', 'myAccounts', 'cpOrders'));
    }

    public function profileUpdateView(){
        $user = auth()->user();
        return view('app.update-profile', compact('user'));
    }

    public function setEmailPass(Request $request, BuyAccount $account){
        $inputs = $request->validate([
            'type' => 'required|max:255',
        ]);

        if($inputs['type'] == 'email-pass'){
            $inputs = $request->validate([
                'email' => 'required|email|unique:buy_accounts,email',
                'password' => 'required|min:4',
            ]);
            if(auth()->user()->cart_number == null Or auth()->user()->shabba_number == null){
                return redirect()->route('profile.update.view')->with('error', 'ابتدا اطلاعات مالی خود را کامل کنید');
            }
    
            if($account->email != null){
                return back()->with('error', 'برای این درخواست قبلا ایمیل و رمز عبور ثبت شده است');
    
            }
            $inputs['status'] = 2;
    
            $account->update($inputs);
            return back()->with('success', 'ایمیل و رمز عبور حساب شما با موفقیت ثبت شد, منتظر باشید');

        }else{
            $inputs = $request->validate([
                'code' => 'required|max:255',
            ]);

            $account->update(['verify_code' => $inputs['code']]);
            return back()->with('success', 'کد وریفای ارسال شد، منتظر تایید کارشناسان باشید');

        }
        
    }

    

    public function profileUpdateUpdate(Request $request){
        $inputs = $request->validate([
            'phone' => 'required|string|max:11|min:11',
            'username' => 'nullable|string|max:255||unique:users,username,' . auth()->user()->id,
            'cart_number' => 'nullable|string|max:255|max:16|min:16',
            'shabba_number' => 'nullable|string|max:255|max:24|min:24',
            'profile' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048'
        ]);
        $inputs['phone'] = substr($inputs['phone'], 1);
        $checkPhone = User::where('phone', $inputs['phone'])->first();

        if($checkPhone != null){
            if($checkPhone->id != auth()->user()->id){
                return back()->with('error', 'تلفن از قبل ثبت شده است');
            }
        }
        

        if($request->file('profile')){
            $secondName = time() . '.' . $request->file('profile')->getClientOriginalExtension();
            $request->profile->move(public_path('images/profiles/'), $secondName);
            $inputs['profile'] = $secondName;
        }


        auth()->user()->update($inputs);
        return back()->with('success', 'حساب کاربری شما با موفقیت ویرایش شد');
        
    }


    public function saveUserName(Request $request){
        $inputs = $request->validate([
            'username' => 'required|unique:users,username'
        ]);
        
        if(auth()->check()){
            auth()->user()->update($inputs);
            return back()->with('success', 'نام کاربری با موفقیت ثبت شد');
        }else{
            abort(403);
        }
    }
    
}
