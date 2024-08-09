<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use GuzzleHttp\Psr7\Request;

abstract class Controller
{
    
    public function __construct()
    {
        $url = url()->full();
        $checkAdmin = strpos($url, 'admin');
        if($checkAdmin != false){
            if(auth()->check()){
                if(auth()->user()->role != 1){
                    abort(404);    
                }
            }else{
                abort(404);
            }
        }
    }
}
