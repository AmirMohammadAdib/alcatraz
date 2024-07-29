<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $currentRooms = Room::where('status', '!=' , 2)->orderBy('created_at', 'desc')->get();
        return view('app.app', compact('currentRooms'));
    }

    public function contactUs(){
        return view('app.contact-us');
    }

    public function question(){
        return view('app.question');
    }

    public function notification(){
        return view('app.notification');
    }

    public function stars(){
        return view('app.stars');
    }
}
