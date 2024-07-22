<?php

namespace App\Http\Controllers\Admin\Financial;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdraws = Withdraw::orderBy('created_at', 'desc')->get();
        return view('admin.financial.withdraw.index', compact('withdraws'));
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
    public function edit(Withdraw $withdraw)
    {
        if(isset($_GET['block'])){
            if($withdraw->status == '2'){
                $withdraw->status = '0';
                $msg = 'درخواست برداشت با موفقیت رفع مسدود شد';
            }else{
                $withdraw->status = '2';
                $msg = 'درخواست برداشت با موفقیت مسدود شد';
            }

            $withdraw->save();
            return redirect()->route('withdraw.index')->with('alert-success', $msg);

        }else{
            return view('admin.financial.withdraw.edit', compact('withdraw'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        $inputs = $request->validate([
            'transaction_code' => 'required|string',
            'receipt' => 'required|file|max:2048|mimes:png,jpg,pdf,jpeg',            
        ]);

        if($request->file('receipt')){
            $name = time() . '.' . $request->file('receipt')->getClientOriginalExtension();
            $request->receipt->move(public_path('images/withdraws/'), $name);
            $inputs['receipt'] = $name;
        }

        $inputs['cart_number_freezer'] = $withdraw->user->cart_number;
        $inputs['shabba_number_freezer'] = $withdraw->user->shabba_number;

        $inputs['status'] = '1';

        $withdraw->update($inputs);

        $msg = 'عملیات برداشت کاربر ' . $withdraw->user->username . ' با شناسه ' . $withdraw->transaction_code . ' انجام شد';

        //send SMS

        return redirect()->route('withdraw.index')->with('alert-success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
