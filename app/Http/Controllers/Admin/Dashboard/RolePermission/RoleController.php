<?php

namespace App\Http\Controllers\Admin\Dashboard\RolePermission;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employer;
use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {     
        // $this->middleware('permission:create-roles|view-roles|update-roles|delete-roles', ['only' => ['index', 'show']]);
   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        // dd(auth()->user()->getRoleNames());
        $adminCount = Admin::role('admin')->get()->count();
        $empCount = Employer::role('employer')->get()->count();
        $jskCount = Jobseeker::role('jobseeker')->get()->count();
        // $adminRole = Role::  
        return view('dashboard.admin.roles.index', compact(['roles', 'adminCount', 'empCount', 'jskCount']));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::all();
        return view('dashboard.admin.roles.add-new', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        // \dd($request->all());
        $role=Role::create([
            'name' => $request->name
        ]);
        $role->givePermissionTo($request->permission);
        return redirect()->route('admin.roles.index');
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
    public function edit($id)
    {
        $permissions=Permission::all();
        $role=Role::where('id',$id)->with('permissions')->firstOrFail();
        return view('dashboard.admin.roles.edit', compact('role','permissions'));
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
        $role=Role::find($id);
        $role->update([   
            'name' => $request->name    
        ]);
        // dd($role,$request->permission);
        $role->syncPermissions($request->permission);

        return redirect()->route('admin.roles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id',$id)->first()->delete();
            return redirect()->back()->withSuccess('Your Role has been Deleted');
    }
}
