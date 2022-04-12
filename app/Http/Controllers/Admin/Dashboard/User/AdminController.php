<?php

namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $roles = Role::where('guard_name', 'admin')->get();
        $permissions = Permission::where('guard_name', 'admin')->get();
        $admin = Admin::where('username', $username)->first();
        // $admin = Admin::where('username', $username)->first();

        return view('dashboard.admin.users.admin.edit_admin', compact(['admin', 'roles', 'permissions']));   
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
        if($admin){
            return back()->with('success-p', 'Profile Updated Successfuly');
        }
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

    public function changePassword(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:4'],
            'new_cpassword' => ['same:new_password'],
        ]);

        $admin->update(['password'=>Hash::make($request->new_password)]);

        return redirect()->back()->with(['success' => 'Password Changed']);
    }

    public function changeRole(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        
        $request->validate([
            'name' =>'required'
        ]);

        $admin->syncRoles($request->name);

        if (!$admin) {
            return redirect()->back()->with(['fail-r' => 'Update Failed!']);            
        }
        return redirect()->back()->with(['success-r' => 'Role Changed Succesfuly']);

    }
    
    public function changePermission(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        
        $admin->syncPermissions($request->permission);

        if (!$admin) {
            return redirect()->back()->with(['fail-r' => 'Update Failed!']);            
        }
        return redirect()->back()->with(['success-r' => 'Role Changed Succesfuly']);

    }
}   
