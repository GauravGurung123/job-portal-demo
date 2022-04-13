<?php

namespace App\Http\Controllers\Admin\Dashboard\Job;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Location;
use App\Models\Skill;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('dashboard.admin.jobs.index', ['jobs'=>Job::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('dashboard.admin.jobs.add-new-job',
    [
        'skills' => Skill::all(), 
        'employers' => Employer::all(),
        'locations' => Location::all(),
        'industries' => Industry::all(),
    ]
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employer_id'=> 'required|integer',
            'location_id'=> 'required|integer',
            'industry_id'=> 'required|integer',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'responsibility' => 'nullable',
            'requirement' => 'nullable',
            'application_email' => 'required|max:50',
            'application_url' => 'nullable',
            'job_type' => 'required',
            'openings' => 'required',
            'experience' => 'nullable',
            'status' => 'required',
            'last_date' => 'required|max:255',
            'min_salary' => 'required|integer',
            'max_salary' => 'required|integer',
            'last_date' => 'required',
            'featured' => 'nullable',            
        ]);

        $job = Job::create($validated);

        $skills = $request->skills;

        foreach ($skills as $skill) {
            skill::create([
                'skillable_id' => $job->id,
                'skillable_type' => 'App\Models\Job',
                'name' => $skill,
                'slug' => $skill,
            ]);
        }

        return redirect()->route('admin.jobs.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
