<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\CPOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['history'])){
            $orders = CPOrder::where('status', 2)->orderBy('created_at', 'desc')->get();
            return view('admin.shop.history.index', compact('orders'));
        }else{
            $orders = CPOrder::where('status', '!=', 2)->where('email', '!=', null)->where('password', '!=', null)->orderBy('created_at', 'desc')->orderBy('type', 'desc')->get();
            return view('admin.shop.order.index', compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shop.order.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CPOrder $order)
    {
        $order->status = '2';
        $order->save();
        return redirect()->route('order.index')->with('alert-success', 'سفارش با شناسه ' . $order->id . ' با موفقیت پایان یافت');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CPOrder $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('alert-success', 'سفارش با شناسه ' . $order->id . ' با موفقیت کنسل شد');
    }

    public function mistakePass(CPOrder $order){
        $order->status = '1';
        $order->email = '-';
        $order->password = '-';
        $order->save();

        //send sms to user
        
        return redirect()->route('order.index')->with('alert-success', 'برای کاربر ' . $order->user->username . ' با موفقیت پیامک ارسال شد');
    }
}
