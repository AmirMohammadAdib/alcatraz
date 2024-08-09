<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('role', '1')->orderBy('created_at', 'desc')->get();

        return view('admin.auth.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.auth.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $inputs = $request->all();
        $inputs['role'] = '1';

        $user = User::create($inputs);
        
        //roles create ...
        $user->syncRoles($inputs['roles']);

        return redirect()->route('admin.index')->with('alert-success', 'ادمین جدید با موفقیت ساخته شد');


    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        $roles = Role::all();

        return view('admin.auth.admin.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, User $admin)
    {
        $inputs = $request->all();

        //roles create ...
        $admin->syncRoles($inputs['roles']);

        $admin->update($inputs);
        return redirect()->route('admin.index')->with('alert-success', 'ادمین ' . $admin->username . ' با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $username = $admin->username;
        $admin->delete();
        return redirect()->route('admin.index')->with('alert-success', 'کاربر ' . $username . ' با موفقیت حذف شد');
    }
}
