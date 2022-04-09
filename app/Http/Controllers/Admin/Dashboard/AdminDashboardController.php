<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employer;
use App\Models\Jobseeker;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function dashboard()
    {
        $admins = Admin::all();
        $employers = Employer::all();
        $jobseekers = Jobseeker::all();

        return view('dashboard.admin.index', compact(['admins','employers','jobseekers']));        
    }
    public function show($username)
    {
        $user = Admin::where('username', $username)->first();

        return view('dashboard.admin.profile', compact('user'));        
    }

}
