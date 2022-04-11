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
    public function userList()
    {
        $roles = Role::all();
        $users = Admin::with('roles')->get();

        $admins = Admin::all();
        $employers = Employer::all();
        $jobseekers = Jobseeker::all();

        return view('dashboard.admin.users.index', compact([
            'admins',
            'employers',
            'jobseekers',
            'roles',
            'users',
        ]));  
    }
}
