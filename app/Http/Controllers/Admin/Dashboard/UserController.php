<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Admin;
use App\Models\Employer;
use App\Models\Jobseeker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function userList(Request $request)
    {
        $admin_search = $request['admin_search'] ?? null;
        $employer_search = $request['employer_search'] ?? null;
        $jobseeker_search = $request['jobseeker_search'] ?? null;

        if($admin_search != null){
            $admins = Admin::whereRaw("MATCH(username, name, email) AGAINST(? IN BOOLEAN MODE)", [$admin_search])->whereNotIn('name', ['super admin'])->get();
        } else {            
            if (auth()->user()->hasRole('super admin')){
                $admins = Admin::paginate(10);
            }else{
                $admins = Admin::with('roles')->whereNotIn('name', ['super admin'])->get();            
            }
        }

        if($employer_search != null){
            $employers = Employer::whereRaw("MATCH(username, org_name, email) AGAINST(? IN BOOLEAN MODE)", [$employer_search])->get();
        } else {        
            $employers = Employer::paginate(10);
        }
        
        if($jobseeker_search != null){            
            $jobseekers = Admin::whereRaw("MATCH(name, username, email) AGAINST(? IN BOOLEAN MODE)", [$jobseeker_search])->get();
            // where('username', 'like', "%$jobseeker_search%")->orWhere('name', 'like', "%$jobseeker_search%")->get(); 
        } else {
            $jobseekers = Jobseeker::paginate(10);
        }
        
        $roles = Role::all();
        // $users = Admin::with('roles')->get();

        return view('dashboard.admin.users.index', compact([
            'admin_search',
            'employer_search',
            'jobseeker_search',
            'admins',
            'employers',
            'jobseekers',
            'roles',
            // 'users',
        ]));  
    }
}
