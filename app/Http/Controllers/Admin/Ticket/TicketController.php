<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('created_at', '!=', null);

        if(isset($_GET['status'])){
            if($_GET['status'] == 'new'){
                $tickets->where('seen', '0');
            }elseif($_GET['status'] == 'open'){
                $tickets->where('status', '0')->where('seen', '1');
            }elseif($_GET['status'] == 'close'){
                $tickets->where('status', '1');
            }
        }
        $tickets = $tickets->orderBy('created_at', 'desc')->get();

        foreach(Ticket::where('seen', '0')->get() as $ticket){
            $ticket->seen =1;
            $ticket->save();
        }
        
        return view('admin.ticket.index', compact('tickets'));
    }


    public function show($id){
        return view('admin.ticket.show');
    }
}
