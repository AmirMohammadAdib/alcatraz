<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function roomView(){
        return view('app.room');
    }

    public function roomsView(){
        return view('app.rooms');
    }
}
