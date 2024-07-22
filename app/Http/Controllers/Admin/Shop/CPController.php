<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CP\CPRequest;
use App\Models\CP;
use Illuminate\Http\Request;

class CPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cps = CP::orderBy('created_at', 'desc')->get();
        return view('admin.shop.cp.index', compact('cps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shop.cp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CPRequest $request)
    {
        $inputs = $request->all();

        if($request->file('img')){
            $name = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->img->move(public_path('images/cp/img/'), $name);
            $inputs['img'] = $name;
        }

        if($request->file('cover')){
            $secondName = time() . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->cover->move(public_path('images/cp/cover/'), $secondName);
            $inputs['cover'] = $secondName;
        }

        CP::create($inputs);
        return redirect()->route('cp.index')->with('alert-success', 'محصول جدید با موفقیت ایجاد شد');

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
    public function edit(CP $cp)
    {
        if(isset($_GET['status'])){
            if($cp->status == '0'){
                $cp->status = '1';
                $msg = 'محصول با شناسه ' . $cp->id . ' با موفقیت موجود شد';
            }else{
                $cp->status = '0';   
                $msg = 'محصول با شناسه ' . $cp->id . ' با موفقیت ناموجود شد';
            }
            $cp->save();

            return redirect()->route('cp.index')->with('alert-success', $msg);

        }else{
            return view('admin.shop.cp.edit', compact('cp'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CPRequest $request, CP $cp)
    {
        $inputs = $request->all();

        if($request->file('img')){
            $name = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->img->move(public_path('images/cp/img/'), $name);
            $inputs['img'] = $name;
        }

        if($request->file('cover')){
            $secondName = time() . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->cover->move(public_path('images/cp/cover/'), $secondName);
            $inputs['cover'] = $secondName;
        }

        $cp->update($inputs);
        return redirect()->route('cp.index')->with('alert-success', 'محصول با شناسه ' . $cp->id . ' با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
