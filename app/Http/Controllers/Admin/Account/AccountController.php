<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\AccountRequest;
use App\Models\Account;
use App\Models\AccountCharacter;
use App\Models\AccountGun;
use App\Models\Character;
use App\Models\Gun;
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
        $guns = Gun::all();
        $characters = Character::all();
        return view('admin.account.account.create', compact('guns', 'characters'));
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

        $account = Account::create($inputs);
        foreach($inputs['guns'] as $gun){
            AccountGun::create([
                'account_id' => $account->id,
                'gun_id' => $gun,
            ]);
        }

        foreach($inputs['characters'] as $character){
            AccountCharacter::create([
                'account_id' => $account->id,
                'character_id' => $character,
            ]);
        }


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
        $guns = Gun::all();
        $characters = Character::all();
        $selectedGun = AccountGun::where('account_id', $account->id)->pluck('gun_id')->toArray();
        $selectedCharacter = AccountCharacter::where('account_id', $account->id)->pluck('character_id')->toArray();
        return view('admin.account.account.edit', compact('account', 'guns', 'selectedGun', 'characters', 'selectedCharacter'));
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

        $currentGuns = AccountGun::where('account_id', $account->id)->get();
        foreach($currentGuns as $gun){
            $gun->delete();
        }

        foreach($inputs['guns'] as $gun){
            AccountGun::create([
                'account_id' => $account->id,
                'gun_id' => $gun,
            ]);
        }

        $currentCharacter = AccountCharacter::where('account_id', $account->id)->get();
        foreach($currentCharacter as $character){
            $character->delete();
        }

        foreach($inputs['characters'] as $character){
            AccountCharacter::create([
                'account_id' => $account->id,
                'character_id' => $character,
            ]);
        }
        $account->update($inputs);
        return redirect()->route('account.index')->with('alert-success', 'محصول با شناسه ' . $account->id . ' با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return back()->with('alert-success', 'محصول با شناسه ' . $account->id . ' با موفقیت حذف شد');
    }
}
