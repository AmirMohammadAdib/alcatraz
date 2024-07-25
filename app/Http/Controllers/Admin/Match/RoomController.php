<?php

namespace App\Http\Controllers\Admin\Match;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Match\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!isset($_GET['history'])){
            $rooms = Room::whereIn('status', [0,1])->orderBy('created_at', 'desc')->get();
            return view('admin.match.room.index', compact('rooms'));
        }else{
            return view('admin.match.history.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.match.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $inputs = $request->all();
        Room::create($inputs);
        return redirect()->route('room.index')->with('alert-success', 'روم جدید با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
