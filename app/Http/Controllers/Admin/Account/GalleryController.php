<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\AccountGallery;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['account'])){
            $accountID = $_GET['account'];
            $account = Account::find($accountID);
            if($account == null){
                abort(404);
            }

            return view('admin.account.gallery.index', compact('account'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(isset($_GET['account'])){
            $accountID = $_GET['account'];
            $account = Account::find($accountID);
            if($account == null){
                abort(404);
            }

            return view('admin.account.gallery.create', compact('account'));
        }else{
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'img' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        if($request->file('img')){
            $secondName = time() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->img->move(public_path('images/gallery/'), $secondName);
            $inputs['img'] = $secondName;
        }

        $gallery = Gallery::create($inputs);

        AccountGallery::create([
            'account_id' => $inputs['account_id'],
            'gallery_id' => $gallery->id
        ]);

        return redirect()->route('gallery.index', ['account'=>$inputs['account_id']])->with('alert-success', 'تصویر جدید با موفقیت آپلود شد');
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
    public function destroy(Gallery $gallery)
    {
        AccountGallery::where('gallery_id', $gallery->id)->first()->delete();
        $gallery->delete();
        return redirect()->route('gallery.index', ['account'=>$_GET['account']])->with('alert-success', 'تصویر با شناسه ' . $gallery->id . ' با موفقیت حذف شد');

    }
}
