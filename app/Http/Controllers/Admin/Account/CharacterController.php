<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::orderBy('created_at','desc')->get();
        return view('admin.account.character.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.character.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'name' => 'required|min:1|max:255',
            'img' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        if($request->file('img')){
            $secondName = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->img->move(public_path('images/characters/'), $secondName);
            $inputs['img'] = $secondName;
        }

        Character::create($inputs);
        return redirect()->route('character.index')->with('alert-success', 'کاراکتر جدید با موفقیت ایجاد شد');
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
    public function edit(Character $character)
    {
        return view('admin.account.character.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $inputs = $request->validate([
            'name' => 'required|min:1|max:255',
            'img' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        if($request->file('img')){
            $secondName = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->img->move(public_path('images/characters/'), $secondName);
            $inputs['img'] = $secondName;
        }

        $character->update($inputs);
        return redirect()->route('character.index')->with('alert-success', 'کاراکتر با شناسه ' . $character->id . ' با موفقیت موفق شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('character.index')->with('alert-success', 'کاراکتر با شناسه ' . $character->id . ' با موفقیت حذف شد');

    }
}
