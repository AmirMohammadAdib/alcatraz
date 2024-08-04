<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\CP;
use Illuminate\Http\Request;

class CPController extends Controller
{
    public function shopView(){
        $cps = CP::orderBy('created_at', 'desc')->get();
        return view('app.cp-shop', compact('cps'));
    }

    public function cpView(CP $cp){
        return view('app.cp', compact('cp'));
    }
}
