<?php

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('room/players-count/{room}', function(Room $room){
    return response()->json([
        'httpCode' => 200,
        'result' => [
            'count' => $room->players,
        ]
    ]);
});
