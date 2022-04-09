<?php

namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $admin = Admin::where('username', $username)->first();

        return view('dashboard.admin.users.admin.edit_admin', compact('admin'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'username' => ['required', Rule::unique('admins')->ignore($admin->id),],
            'email' => 'required',Rule::unique('admins', 'email')->ignore($admin->id),            
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:6048'],
        ]);
        
        if(isset($request->image)) {
            $imgName = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imgName);
            $validatedData['profile_photo_path'] = $imgName;
        }else{
            $validatedData['profile_photo_path'] = 'dummy.png';
        }
        

        $admin->update($validatedData);

        return redirect('admin/dashboard/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect('admin/dashboard/users');
    }
}
