<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\CP;
use App\Models\FAQ;
use App\Models\Notification;
use App\Models\Player;
use App\Models\Room;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $faqs = FAQ::orderBy('created_at', 'desc')->get();
        return view('app.question', compact('faqs'));
    }

    public function notification(){
        $notifications = Notification::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('app.notification', compact('notifications'));
    }

    public function stars(){
        $topPlayer = Player::select('user_id', DB::raw('count(*) as total'))
        ->where('status', 1)
        ->groupBy('user_id')
        ->orderBy('total', 'desc')
        ->take(8)->get();


        return view('app.stars', compact('topPlayer'));
    }
}
