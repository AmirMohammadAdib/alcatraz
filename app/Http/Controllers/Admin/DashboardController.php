<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountOrder;
use App\Models\BuyAccount;
use App\Models\CPOrder;
use App\Models\Deposit;
use App\Models\Player;
use App\Models\Room;
use App\Models\Setting;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //calculate income thats from sale CP
        $incomeFromCpShop = 0;
        foreach(CPOrder::all() as $order){
            if($order->payment_id != null){
                $incomeFromCpShop += intval($order->payment->amount);
            }
        }

        //calculate income thats from sale Account
        $incomeFromAccountShop = 0;
        foreach(AccountOrder::all() as $order){
            if($order->payment_id != null){
                $incomeFromAccountShop += intval($order->payment->amount);
            }
        }


        //calculate income thats from room Fee
        $incomeFromRoom = 0;
        foreach(Room::all() as $room){
            $incomeFromRoom += intval($room->fee) * intval($room->players);
        }
        
        //get statistics data
        $statistic = [
            'view' => Setting::find(1)->view,
            'cpOrder' => CPOrder::all()->count(),
            'usersCount' => User::all()->count(),
            'income' => $incomeFromRoom + $incomeFromCpShop + $incomeFromAccountShop,
        ];

        $topUsers = Player::select('user_id', DB::raw('count(*) as total'))
                          ->where('status', 1)
                          ->groupBy('user_id')
                          ->orderBy('total', 'desc')
                          ->take(7)->get();

        $requests = BuyAccount::where('status', 0)->orderBy('created_at', 'desc')->get()->take(6);
        $currentRooms = Room::where('status', 1)->orderBy('created_at', 'desc')->get()->take(6);
        $deposites = Deposit::where('status', 1)->orderBy('created_at', 'desc')->get()->take(6);
        $withdraws = Withdraw::where('status', 1)->orderBy('created_at', 'desc')->get()->take(6);
        
        return view('admin.dashboard', compact('statistic', 'topUsers', 'requests', 'currentRooms', 'deposites', 'withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit(string $id)
    {
        //
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
