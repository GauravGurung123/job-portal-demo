<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Jobseeker;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function dashboard()
    {
        $admins = Admin::count();

        $employers = Employer::count();
        $employers=$employers?$employers:0;
        $activeEmployerPercent=round((Employer::where('status', 'Active')->count()/$employers)*100);
        
        $jobseekers = Jobseeker::count();
        $jobseekers=$jobseekers?$jobseekers:0;
        $activeJobseekerPercent=round((Jobseeker::where('status', 'Active')->count()/$jobseekers)*100);
        
        $jobs=Job::count();
        $jobs=$jobs?$jobs:0;
        $activeJobPercent=round((Job::where('status', 'Active')->count()/$jobs)*100);
        
        return view('dashboard.admin.index', compact(
            ['admins','employers','jobseekers','jobs', 'activeJobPercent', 'activeJobseekerPercent', 'activeEmployerPercent']
        ));        
    }
    public function show($username)
    {
        $user = Admin::where('username', $username)->first();

        return view('dashboard.admin.profile', compact('user'));        
    }

}
