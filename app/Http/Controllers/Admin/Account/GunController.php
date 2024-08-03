<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\Gun;
use Illuminate\Http\Request;

class GunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guns = Gun::orderBy('created_at','desc')->get();
        return view('admin.account.gun.index', compact('guns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.gun.create');
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
            $request->img->move(public_path('images/guns/'), $secondName);
            $inputs['img'] = $secondName;
        }

        Gun::create($inputs);
        return redirect()->route('gun.index')->with('alert-success', 'گان جدید با موفقیت ایجاد شد');
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
    public function edit(Gun $gun)
    {
        return view('admin.account.gun.edit', compact('gun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gun $gun)
    {
        $inputs = $request->validate([
            'name' => 'required|min:1|max:255',
            'img' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        if($request->file('img')){
            $secondName = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->img->move(public_path('images/guns/'), $secondName);
            $inputs['img'] = $secondName;
        }

        $gun->update($inputs);
        return redirect()->route('gun.index')->with('alert-success', 'گان با شناسه ' . $gun->id . ' با موفقیت موفق شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gun $gun)
    {
        $gun->delete();
        return redirect()->route('gun.index')->with('alert-success', 'گان با شناسه ' . $gun->id . ' با موفقیت حذف شد');

    }
}
