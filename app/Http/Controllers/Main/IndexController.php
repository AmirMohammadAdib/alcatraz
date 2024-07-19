<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('app.app');
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
