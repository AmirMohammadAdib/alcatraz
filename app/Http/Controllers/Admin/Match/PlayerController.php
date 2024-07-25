<?php

namespace App\Http\Controllers\Admin\Match;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['room_id'])){
            $players = Player::where('room_id', $_GET['room_id'])->orderBy('created_at', 'desc')->get();
            return view('admin.match.player.index', compact('players'));
        }else{
            return back()->with('alert-danger', 'وارد کردن شناسه روم الزامیست');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.match.player.create');
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
    public function edit(Player $roomPlayer)
    {
        if($roomPlayer->status == 0){
            $roomPlayer->status = 1;
            $msg = 'وضعیت کاربر ' . $roomPlayer->user->username . ' از بازنده به برنده تغییر یافت';
        }else{
            $roomPlayer->status = 0;
            $msg = 'وضعیت کاربر ' . $roomPlayer->user->username . ' از برنده به بازنده تغییر یافت';
        }

        $roomPlayer->save();
        return back()->with('alert-success', $msg);
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
