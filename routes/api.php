<?php

use App\Models\AccountOrder;
use App\Models\CPOrder;
use App\Models\Player;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Morilog\Jalali\Jalalian;

Route::get('room/players-count/{room}', function(Room $room){
    return response()->json([
        'httpCode' => 200,
        'result' => [
            'count' => $room->players,
        ]
    ]);
});


Route::get('/cp-order', function(){
    $data = [];
    $month = [];

    for ($i = 0; $i < 12; $i++) {
        // محاسبه تاریخ شروع و پایان ماه
        $sales = CPOrder::where('created_at','!=', null);

        $startDate = date('Y-m-01 00:00:00', strtotime('-' . $i . ' months'));
        $endDate = date('Y-m-t 23:59:59', strtotime('-' . $i . ' months'));

        $totalSale = $sales->whereBetween('created_at', [$startDate, $endDate])->get()
        ->map(function ($order) {
            return $order->payment->pluck('amount')->sum(); // Payment details related to each order
        });

        
        if(count($totalSale) == 0){
            $totalSale = 0;
        }else{
            $totalSale = $totalSale->sum();
        }

        // // اضافه کردن نتایج به آرایه
        array_push($data, intval($totalSale));

        array_push($month, verta($startDate)->format('F'));
    }

    return response()->json([
        'httpCode' => 200,
        'result' => [
            'data' => array_reverse($data),
            'month' => array_reverse($month)
        ],
    ]);
});


Route::get('/account-order', function(){
    $data = [];
    $month = [];

    for ($i = 0; $i < 12; $i++) {
        // محاسبه تاریخ شروع و پایان ماه
        $sales = AccountOrder::where('created_at','!=', null);

        $startDate = date('Y-m-01 00:00:00', strtotime('-' . $i . ' months'));
        $endDate = date('Y-m-t 23:59:59', strtotime('-' . $i . ' months'));

        $totalSale = $sales->whereBetween('created_at', [$startDate, $endDate])->get()
        ->map(function ($order) {
            return $order->payment->pluck('amount')->sum(); // Payment details related to each order
        });

        
        if(count($totalSale) == 0){
            $totalSale = 0;
        }else{
            $totalSale = $totalSale->sum();
        }

        // // اضافه کردن نتایج به آرایه
        array_push($data, intval($totalSale));

        array_push($month, verta($startDate)->format('F'));
    }

    return response()->json([
        'httpCode' => 200,
        'result' => [
            'data' => array_reverse($data),
            'month' => array_reverse($month)
        ],
    ]);
});



Route::get('/users', function(){
    $first = [];
    $nob = [];
    $player = [];
    $proPlayer = [];
    $ultraPlayer = [];
    $month = [];

    for ($i = 0; $i < 12; $i++) {
        // محاسبه تاریخ شروع و پایان ماه
        $users = User::where('created_at','!=', null);
        
        $startDate = date('Y-m-01 00:00:00', strtotime('-' . $i . ' months'));
        $endDate = date('Y-m-t 23:59:59', strtotime('-' . $i . ' months'));

        $totalUsersFirst = User::where('level', 0)->whereBetween('created_at', [$startDate, $endDate])->get()->count();
        $totalUsersNob = User::where('level', 1)->whereBetween('created_at', [$startDate, $endDate])->get()->count();
        $totalUsersPlayer = User::where('level', 2)->whereBetween('created_at', [$startDate, $endDate])->get()->count();
        $totalUsersProPlayer = User::where('level', 3)->whereBetween('created_at', [$startDate, $endDate])->get()->count();
        $totalUsersUltraPlayer = User::where('level', 4)->whereBetween('created_at', [$startDate, $endDate])->get()->count();
        
        
        // // اضافه کردن نتایج به آرایه
        array_push($first, $totalUsersFirst);
        array_push($nob, $totalUsersNob);
        array_push($player, $totalUsersPlayer);
        array_push($proPlayer, $totalUsersProPlayer);
        array_push($ultraPlayer, $totalUsersUltraPlayer);

        array_push($month, verta($startDate)->format('F'));
    }

    return response()->json([
        'httpCode' => 200,
        'result' => [
            'first' => array_reverse($first),
            'nob' => array_reverse($nob),
            'player' => array_reverse($player),
            'proPlayer' => array_reverse($proPlayer),
            'ultraPlayer' => array_reverse($ultraPlayer),
            'month' => array_reverse($month)
        ],
    ]);
});





Route::get('/games/{player}', function(User $player){
    $data = [];
    $month = [];

    for ($i = 0; $i < 12; $i++) {
        // محاسبه تاریخ شروع و پایان ماه
        $games = Player::where('user_id', $player->id)->where('created_at','!=', null);

        $startDate = date('Y-m-01 00:00:00', strtotime('-' . $i . ' months'));
        $endDate = date('Y-m-t 23:59:59', strtotime('-' . $i . ' months'));

        $totalGame = $games->whereBetween('created_at', [$startDate, $endDate])->get()->count();


        // // اضافه کردن نتایج به آرایه
        array_push($data, intval($totalGame));

        array_push($month, verta($startDate)->format('F'));
    }

    return response()->json([
        'httpCode' => 200,
        'result' => [
            'data' => array_reverse($data),
            'month' => array_reverse($month)
        ],
    ]);
});


Route::get('new-orders', function(){
    $orders = CPOrder::where('status', '!=', 2)->where('email', '!=', null)->where('password', '!=', null)->orderBy('created_at', 'desc')->orderBy('type', 'desc')->get();
    foreach($orders as $order){
        $order->user;
        $order->cp;
        $order->superClass = '';
        if($order->type == 1){
            $order->superClass = 'class="super"';
        }
        if($order->type == 0){
            $order->type = 'فوری';
        }else{
            $order->type = 'سوپر فوری';
        }
        $order->created_atk = verta($order->created_at)->format('Y-m-d');
        $order->deleteRoute = route('order.destroy', [$order]); 
        $order->editRoute = route('order.edit', [$order]); 
        $order->mistakeRoute = route('order.mistake-pass', [$order]); 
        $order->checkBTN = false;

        if(($order->email != null AND $order->password != null) AND ($order->email != '-' AND $order->password != '-')){
            $order->checkBTN = true;
        }
        if($order->email == null){
            $order->email = '-';
        }
        if($order->password == null){
            $order->password = '-';
        }


    }

    return response()->json([
        'httpCode' => 200,
        'result' => $orders
    ]);
});