<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\CP;
use App\Models\Room;
use App\Models\Ticket;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $currentRooms = Room::where('status', '!=' , 2)->orderBy('created_at', 'desc')->get();
        $products = CP::orderBy('created_at', 'desc')->get();
        return view('app.app', compact('currentRooms', 'products'));
    }

    public function contactUs(){
        return view('app.contact-us');
    }


    public function contactUsStore(Request $request){
        $inputs = $request->validate([
            'subject' => 'required|min:3|max:255',
            'periority' => 'required|numeric|min:0|max:3',
            'description' => 'required|min:3|max:500',
            'file' => 'nullable|file|max:2048|mimes:png,jpg,jpeg,webp,pdf,xsl',
        ]);

        if($request->file('file')){
            $secondName = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file->move(public_path('images/ticket/'), $secondName);
            $inputs['file'] = $secondName;
        }

        $inputs['user_id'] = 1;
        Ticket::create($inputs);
        return redirect()->route('profile.view')->with('success', 'تیکت بصورت موفق ایجاد شد و در دست کارشناسان ما قرار گرفت');
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
