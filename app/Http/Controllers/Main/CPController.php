<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\CP;
use App\Models\CPOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CPController extends Controller
{
    public function shopView(){
        $cps = CP::orderBy('created_at', 'desc')->get();
        return view('app.cp-shop', compact('cps'));
    }

    public function cpView(CP $cp){
        $buy = false;
        if(auth()->check()){
            $checkBuy = CPOrder::where('user_id', auth()->user()->id)->where('cp_id', $cp->id)->where('status', '!=', 2)->first();
            if($checkBuy != null){
                $buy = $checkBuy;
            }   
        }
        return view('app.cp', compact('cp', 'buy'));
    }

    public function store(CP $cp, Request $request){
        if(auth()->check()){
            $user = auth()->user();
            $wallet = intval($user->wallet);

            if(isset($_GET['update'])){
                $inputs = $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                $order = CPOrder::where('user_id', auth()->user()->id)->where('cp_id', $cp->id)->where('status', 1)->first();

                if($order->type == 1){
                    $inputs['expire_time'] = Carbon::now()->addMinute(3)->toDateTimeString();
                    $order->update($inputs);
                    return redirect()->route('shop.cp.view', $cp)->with('success', 'تا سه دقیقه آینده cp برای شما واریز خواهد شد');
                    
                }else{
                    $order->update($inputs);

                    return redirect()->route('app.index')->with('success', 'درخواست شما با موفقیت ثبت شد');
                }
            }else{
                if(isset($_GET['type'])){
                    $type = $_GET['type'];
                    
                    if($type == 'normal'){
                        if($wallet >= intval($cp->price)){
                            CPOrder::create([
                                'user_id' => $user->id,
                                'cp_id' => $cp->id,
                                'status' => 1,
                            ]);
                    
                            
                            $user->update(['wallet' => $wallet - intval($cp->price)]);
                            return back()->with('success', 'خرید با موفقیت انجام شد، لطفا اطلاعات خود را وارد کنید');
    
                        }else{
                            $leftOver = intval($cp->price) - $wallet;
                            return redirect()->route('wallet.view', ['deposit' => $leftOver])->with('error', 'ابتدا کیف پول خود را شارژ کنید');
                        }
                    }elseif($type == 'super'){
                        if($wallet >= intval($cp->super_price)){
                            CPOrder::create([
                                'user_id' => $user->id,
                                'cp_id' => $cp->id,
                                'status' => 1,
                                'type' => 1
                            ]);
                            
                            $user->update(['wallet' => $wallet - intval($cp->super_price)]);
                            return back()->with('success', 'خرید با موفقیت انجام شد، لطفا اطلاعات خود را وارد کنید');
    
                        }else{
                            $leftOver = intval($cp->super_price) - $wallet;
                            return redirect()->route('wallet.view', ['deposit' => $leftOver])->with('error', 'ابتدا کیف پول خود را شارژ کنید');
                        }
                    }else{
                        return back()->with('error', 'متغیر ارسال شده نامعتبر است');
                    }
                }else{
                    return back()->with('error', 'ارسال متغیر خواسته شده الزامیست');
                }
            }
        }else{
            return back()->with('error', 'ابتدا وارد حساب کاربری خود شوید');
        }
    }
}
