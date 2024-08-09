<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.auth.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.auth.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $inputs['name'], 'guard_name' => 'web']);
        $role->syncPermissions($inputs['permissions']);

        return redirect()->route('role.index')->with('success', 'نقش با موفقیت ایجاد شد');
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
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $selectedPermissions = $role->permissions->pluck("id")->toArray();
        return view('admin.auth.role.edit', compact('permissions', 'role', 'selectedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $inputs = $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required|array',
        ]);

        $role->update(['name' => $inputs['name']]);
        $role->syncPermissions($inputs['permissions']);

        return redirect()->route('role.index')->with('success', 'نقش با شناسه ' . $role->id . ' با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'نقش با شناسه ' . $role->id . ' با موفقیت حذف شد');
    }
}
