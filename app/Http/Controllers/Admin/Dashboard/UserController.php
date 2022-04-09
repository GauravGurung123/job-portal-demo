<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Admin;
use App\Models\Employer;
use App\Models\Jobseeker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList()
    {
        $admins = Admin::all();
        $employers = Employer::all();
        $jobseekers = Jobseeker::all();

        return view('dashboard.admin.users.index', compact(['admins','employers','jobseekers']));  
    }
}
