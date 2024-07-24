<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\BuyAccount;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = BuyAccount::where('created_at', '!=', null);

        if(isset($_GET['sort'])){
            if($_GET['sort'] == 'waiting'){
                $requests->where('status', '1');
            }elseif($_GET['sort'] == 'not-check'){
                $requests->where('status', '0');
            }elseif($_GET['sort'] == 'transfer'){
                $requests->where('status', '2');
            }elseif($_GET['sort'] == 'paying'){
                $requests->where('status', '3');
            }elseif($_GET['sort'] == 'finished'){
                $requests->where('status', '4');
            }
        }

        $requests = $requests->orderBy('created_at', 'desc')->get();

        return view('admin.account.request.index', compact('requests'));
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
        $inputs = $request->validate([
            'price' => 'required|numeric|min:1000',
            'request_id' => 'required|numeric|exists:buy_accounts,id'
        ]);
        $requestModel = BuyAccount::find($inputs['request_id']);
        $requestModel->status = 1;
        $requestModel->site_price = $inputs['price'];
        $requestModel->save();

        return back()->with('alert-success', 'درخواست با شماره ' . $requestModel->id . ' در لیست انتظار کاربر قرار گرفت');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.account.request.payment');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.account.request.edit');
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
    public function destroy(string $id)
    {
        //
    }
}
