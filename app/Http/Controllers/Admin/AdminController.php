<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function show($username)
    {
        $user = Admin::where('username', $username)->first();

        return view('dashboard.admin.profile', compact('user'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|unique:admins,username',
            'email' => 'required|email|unique:admins,email',
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:6048'],
            'password' => 'required|min:4|max:30',
            'cpassword' => 'required|min:4|max:30|same:password',

        ]);
        if(isset($request->image)) {
            $imgName = $request->image->getClientOriginalName().time();
            $request->image->move(public_path('images'), $imgName);
        }else{
            $imgName='dummy.png';
        }
        $validated = array_replace
        (
            $validated,
            [
                'password' => Hash::make($request->password),
                'image' => $imgName,
            ]
        );

        // dd($validated);
        
        Admin::create($validated);

        return redirect('/admin/login');
    }

}
