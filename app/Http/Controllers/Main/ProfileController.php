<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView(){
        return view('app.profile');
    }

    public function profileUpdateView(){
        return view('app.update-profile');
    }

}
