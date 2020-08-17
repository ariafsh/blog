<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class ChangeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = admin::all();

        return view('admin.edit', compact('users'));
    }

    public function change(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['nullable', 'string', 'min:8'],
            'phone' => ['required', 'numeric', 'min:8'],
        ]);

        $admin = admin::where('id', $id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->save();

        return redirect(route('user.index'));
    }
}
