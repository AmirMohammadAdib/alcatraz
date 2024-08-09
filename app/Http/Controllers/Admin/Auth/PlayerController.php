<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\UserRequest;
use App\Models\BuyAccount;
use App\Models\Deposit;
use App\Models\Player;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = User::where('role', '0')->orderBy('created_at', 'desc')->get();
        return view('admin.auth.player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.auth.player.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $inputs = $request->all();
        User::create($inputs);
        return redirect()->route('player.index')->with('alert-success', 'بازیکن جدید با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $player)
    {
        $winners = Player::where('user_id', $player->id)->where('status', 1)->get();
        $deposites = Deposit::where('user_id', $player->id)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $withdraws = Withdraw::where('user_id', $player->id)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $requests = BuyAccount::where('user_id', $player->id)->orderBy('created_at', 'desc')->get();

        return view('admin.auth.player.show', compact('player', 'winners', 'deposites', 'withdraws', 'requests'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $player)
    {
        return view('admin.auth.player.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $player)
    {
        $inputs = $request->all();
        $player->update($inputs);
        return redirect()->route('player.index')->with('alert-success', 'کاربر ' . $player->username . ' با موفقیت ویرایش یافت');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $player)
    {
        $username = $player->username;
        $player->delete();
        return redirect()->route('player.index')->with('alert-success', 'کاربر ' . $username . ' با موفقیت حذف شد');
    }
}
