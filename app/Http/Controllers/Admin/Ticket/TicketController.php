<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('created_at', '!=', null);

        if(isset($_GET['status'])){
            if($_GET['status'] == 'new'){
                $tickets->where('admin_id', null)->where('seen', '0');
            }elseif($_GET['status'] == 'open'){
                $tickets->where('ticket_id', null)->where('status', '0')->where('seen', '1');
            }elseif($_GET['status'] == 'close'){
                $tickets->where('ticket_id', null)->where('status', '1');
            }
        }else{
            $tickets->where('ticket_id', null);
        }
        $tickets = $tickets->orderBy('created_at', 'desc')->get();

        foreach(Ticket::where('seen', '0')->get() as $ticket){
            $ticket->seen =1;
            $ticket->save();
        }
        
        return view('admin.ticket.index', compact('tickets'));
    }


    public function show(Ticket $ticket){
        return view('admin.ticket.show', compact('ticket'));
    }

    public function answer(Request $request, Ticket $ticket){
        $inputs = $request->validate([
            'description' => 'required|min:2|max:1000|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u'
        ]);
        $adminID = auth()->user()->id;
        $inputs = $request->all();
        $inputs['subject'] = $ticket->subject;
        $inputs['description'] = $request->description;
        $inputs['seen'] = 1;
        $inputs['reference_id'] = $ticket->reference_id;
        $inputs['user_id'] = $adminID;
        $inputs['category_id'] = $ticket->category_id;
        $inputs['priority_id'] = $ticket->priority_id;
        $inputs['ticket_id'] = $ticket->id;
        foreach($ticket->children as $child){
            if($child->admin_id == null){

                $child->admin_id = $adminID;
                $child->save();
            }
        }
        if($ticket->admin_id == null){

            $ticket->admin_id = $adminID;
            $ticket->save();
        }
        $ticket = Ticket::create($inputs);
        return redirect()->route('admin.ticket.index')->with('alert-success', 'پاسخ شما با موفقیت ثبت شد');
    }

    public function change(Ticket $ticket){
        $ticket->status == 0 ? $ticket->status = 1 : $ticket->status = 0;
        foreach($ticket->children as $child){
            $child->status == 0 ? $child->status = 1 : $child->status = 0;
            $child->save();
        }
        $ticket->save();
        return redirect()->route('admin.ticket.index')->with('alert-success', 'تیکت با موفقیت تغییر وضعیت یافت');
    }
}
