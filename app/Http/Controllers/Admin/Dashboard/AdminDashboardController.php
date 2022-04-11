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
        $admins = Admin::all()->count();
        $employers = Employer::all()->count();
        $employers=$employers?$employers:0;
        $activeEmployer=Employer::where('status', 'Active')->get()->count();
        $activeEmployerPercent=($activeEmployer/$employers)*100;
        
        $jobseekers = Jobseeker::all()->count();
        $jobseekers=$jobseekers?$jobseekers:0;
        $activeJobseeker=Jobseeker::where('status', 'Active')->get()->count();
        $activeJobseekerPercent=($activeJobseeker/$jobseekers)*100;
        
        $jobs=Job::all()->count();
        $jobs=$jobs?$jobs:0;
        $activeJob=Job::where('status', 'Active')->get()->count();
        $activeJobPercent=($activeJob/$jobs)*100;
        
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
