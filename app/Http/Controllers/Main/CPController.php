<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CPController extends Controller
{
    public function shopView(){
        return view('app.cp-shop');
    }

    public function cpView(){
        return view('app.cp');
    }
}
