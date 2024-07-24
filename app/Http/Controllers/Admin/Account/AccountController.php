<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\AccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::orderBy('created_at', 'desc')->get();
        return view('admin.account.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request)
    {
        $inputs = $request->all();

        if($request->file('img')){
            $secondName = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->img->move(public_path('images/account/'), $secondName);
            $inputs['img'] = $secondName;
        }

        Account::create($inputs);
        return redirect()->route('account.index')->with('alert-success', 'محصول جدید با موفقیت ایجاد شد');
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
    public function edit(Account $account)
    {
        return view('admin.account.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, Account $account)
    {
        $inputs = $request->all();

        if($request->file('img')){
            $secondName = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->img->move(public_path('images/account/'), $secondName);
            $inputs['img'] = $secondName;
        }

        $account->update($inputs);
        return redirect()->route('account.index')->with('alert-success', 'محصول با شناسه ' . $account->id . ' با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
