<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function roomView(Room $room){
        if(auth()->check()){
            $user = auth()->user();
            if($user->username != null){
                if($room->status != 2){
                    if($room->players == $room->capacity){
                        return back()->with('error', 'ظرفیت روم تکمیل شده است');
                    }
                    if($room->fee != null){
                        if(intval($user->wallet) <= intval($room->fee)){
                            return redirect()->route('wallet.view', ['deposit' => intval($room->fee) - intval($user->wallet)]);
                        }
                    }
                    


                    $checkExists = Player::where('room_id', $room->id)->where('user_id', $user->id)->first();
                    if($checkExists == null){
                        Player::create([
                            'room_id' => $room->id,
                            'user_id' => $user->id,
                        ]);
                        $room->update([
                            'players' => intval($room->players) + 1
                        ]);
                    }

                    return redirect($room->link);
                }else{
                    return back()->with('error', 'وضعیت روم نامعتیر');
                }
            }else{
                return back()->with('store-username', true);
            }
        }else{
            return redirect()->route('login.otp.view', ['redirect' => url()->fulll()]);
        }
    }

    public function roomsView(){
        $rooms = Room::where('status', '!=', 2)->orderBy('created_at', 'desc')->get();
        return view('app.rooms', compact('rooms'));
    }
}
