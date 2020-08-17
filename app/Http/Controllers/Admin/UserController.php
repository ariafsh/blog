<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index()
    {
        $users = admin::all();

        return view('admin.user.show', compact('users'));
    }

    public function create()
    {
        if (Auth::user()->can('users.create')) {
            $roles = role::all();
            return view('admin.user.create', compact('roles'));
        }
        return redirect(route('admin.home'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'username' => ['nullable', 'string', 'min:8', 'unique:admins'],
            'phone' => ['required', 'numeric', 'min:8', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->role);

        return redirect(route('user.index'));
    }

    public function edit($id)
    {
        if (Auth::user()->can('users.update')) {
            $user = admin::find($id);
            $roles = role::all();
            return view('admin.user.edit', compact('user', 'roles'));
        }
        return redirect(route('admin.home'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['nullable', 'string', 'min:8'],
            'phone' => ['required', 'numeric', 'min:8'],
        ]);

        $request->status? : $request['status'] = 0;
        $user = admin::where('id', $id)->update($request->except('_token', '_method', 'role'));
        admin::find($id)->roles()->sync($request->role);

        return redirect(route('user.index'));
    }

    public function destroy($id)
    {
        admin::where('id', $id)->delete();
        return redirect()->back();
    }
}
