<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountOrder;
use App\Models\CPOrder;
use App\Models\Room;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

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
                $incomeFromCpShop == intval($order->payment->amount);
            }
        }

        //calculate income thats from sale Account
        $incomeFromAccountShop = 0;
        foreach(AccountOrder::all() as $order){
            if($order->payment_id != null){
                $incomeFromAccountShop == intval($order->payment->amount);
            }
        }

        //get statistics data
        $statistic = [
            'view' => Setting::find(1)->view,
            'cpOrder' => CPOrder::all()->count(),
            'userCount' => User::all()->count(),
            'income' => intval(Room::all()->pluck('fee')->sum()) + $incomeFromCpShop + $incomeFromAccountShop,
        ];

        return view('admin.dashboard', compact('statistic'));
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
