<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Role::all();
        return view('backend.role.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view("backend.role.create", compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles,name']);
        $role = Role::create(['guard_name' => 'admin','name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
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
        $role = Role::find($id);
        $permissions = Permission::all();
        $permissions_id_roles = $role->permissions()->pluck('id')->toArray();
        return view('backend.role.edit', compact('role', 'permissions', 'permissions_id_roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required|unique:roles,name,' . $id]);
        $role = Role::find($id);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        session()->flash('success', 'Role updated successfully');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // role delete with permission
        $role = Role::findById($id);
        $role->syncPermissions([]);
        $role->delete();
        session()->flash('success', 'Role deleted successfully');
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
    }
}
