<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        return view('app.tickets');
    }

    public function show(Ticket $ticket){
        return view('app.ticket', compact('ticket'));
    }

    public function store(Request $request, Ticket $ticket){
        $inputs = $request->validate([
            'subject' => 'required|min:3|max:255',
            'periority' => 'required|numeric|min:0|max:3',
            'description' => 'required|min:3|max:500',
            'file' => 'nullable|file|max:2048|mimes:png,jpg,jpeg,webp,pdf,xsl',
        ]);

        $adminID = auth()->user()->id;
        $inputs['subject'] = $inputs['subject'];
        $inputs['description'] = $inputs['description'];
        $inputs['reference_id'] = $ticket->reference_id;
        $inputs['user_id'] = auth()->user()->id;
        $inputs['category_id'] = $ticket->category_id;
        $inputs['priority_id'] = $ticket->priority_id;
        $inputs['ticket_id'] = $ticket->id;

        if($request->file('file')){
            $secondName = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('images/ticket/'), $secondName);
            $inputs['file'] = $secondName;
        }

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
        return redirect()->route('tickets.view')->with('success', 'پاسخ شما برای تیکت با شناسه ' . $ticket->id . ' با موفقیت ثبت شد');
    }
}
