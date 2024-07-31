<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function roomView(Room $room){
        $players = Player::where('room_id', $room->id)->get();
        return view('app.room', compact('players'));
    }

    public function roomsView(){
        $rooms = Room::where('status', '!=', 2)->orderBy('created_at', 'desc')->get();
        return view('app.rooms', compact('rooms'));
    }
}
