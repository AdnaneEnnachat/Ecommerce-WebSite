<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Couchbase\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisteredAdminController extends Controller
{
    public function create(){
        $admins = Admin::all();
        return view('Admin.auth.register',compact('admins'));
    }
    public function store(Request $request)
    {
        $roles = ['admin','superadmin'];
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role'=>['required','string',Rule::in($roles)],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);



        return back()->with('message','added');
    }
}
