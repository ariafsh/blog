<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PermissionController extends Controller
{
    public function index()
    {
        $permissions = permission::all();
        return view('admin.permission.show', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|unique:permissions',
            'for' => 'required',
        ]);

        $permission = new permission;
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();

        return redirect(route('permission.index'));
    }

    public function show(permission $permission)
    {
        //
    }

    public function edit(permission $permission)
    {
        $permission = permission::find($permission->id);
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Request $request, permission $permission)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'for' => 'required',

        ]);

        $permission = permission::find($permission->id);
        $permission->name = $request->name;
        $permission->for = $request->for;
        $permission->save();

        return redirect(route('permission.index'));
    }

    public function destroy(permission $permission)
    {
        permission::where('id', $permission->id)->delete();
        return redirect()->back();
    }
}
