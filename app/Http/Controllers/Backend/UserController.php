<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAdminRequest;
use App\Models\Admin;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:user list'])->only('index');
        $this->middleware(['permission:user create'])->only('create', 'store');
        $this->middleware(['permission:user edit'])->only('edit', 'update');
        $this->middleware(['permission:user delete'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // abourt_if(!auth()->user()->hasPermissionTo('read_users'), 403);
        // abourt_if(!auth()->user()->can('read_users'), 403);

        $datas = Admin::getAllAdmins();
        return view("backend.user.index", compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view("backend.user.create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAdminRequest $request)
    {
        $validatedData = $request->validated();

        $admin = Admin::createAdmin($validatedData);
        $admin->assignRole($request->roles);



        session()->flash('success', 'User created successfully.');

        return redirect()->route("admin.users.index")->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Admin::getAdminById($id);
        return view("backend.user.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Admin::getAdminById($id);
        $roles = Role::all();
        return view("backend.user.edit", compact(['data', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        Admin::updateAdmin($validatedData, $id);
        $admin = Admin::getAdminById($id);
        $admin->syncRoles($request->roles);

        session()->flash('success', 'User updated successfully.');
        return redirect()->route("admin.users.index")->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::getAdminById($id);
        $admin->deleteAdmin($id);
        session()->flash('success', 'User deleted successfully.');
        return redirect()->route("admin.users.index")->with('success', 'User deleted successfully.');
    }
}
