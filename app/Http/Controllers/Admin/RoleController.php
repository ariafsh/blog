<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\permission;
use App\Model\admin\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = role::all();

        return view('admin.role.show',compact('roles'));
    }

    public function create()
    {
        $permissions = permission::all();
        return view('admin.role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|max:50|unique:roles',
        ]);

        $role = new role;
        $role->role = $request->role;
        $role->save();

        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = role::find($id);
        $permissions = permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'role' => 'required|max:50',
        ]);

        $role = role::find($id);
        $role->role = $request->role;
        $role->save();

        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'));
    }

    public function destroy($id)
    {
        role::where('id', $id)->delete();
        return redirect()->back();
    }
}
