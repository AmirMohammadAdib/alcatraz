<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['history'])){
            $orders = AccountOrder::where('status', 3)->orderBy('created_at', 'desc')->get();
            return view('admin.account.history.index', compact('orders'));
        }else{
            $orders = AccountOrder::where('status', '!=', 3)->orderBy('created_at', 'desc')->get();
            return view('admin.account.order.index', compact('orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit(AccountOrder $accountOrder)
    {
        $accountOrder->update(['status' => 3]);
        return back()->with('alert-success', 'سفارش با شناسه ' . $accountOrder->id . ' با موفقیت پایان یافت');
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
    public function destroy(AccountOrder $accountOrder)
    {
        $accountOrder->delete();
        return back()->with('alert-success', 'سفارش با شناسه ' . $accountOrder->id . ' با موفقیت کنسل شد');

    }
}
