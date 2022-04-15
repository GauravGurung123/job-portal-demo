<?php

namespace App\Http\Controllers\Admin\Dashboard\Industry;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Job;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::paginate(10);
        $activeJobs = Job::where('status', 'Active')->get();
        // dd($activeJobs);
        
        return  view('dashboard.admin.jobs.industries.index', ['industries'=>$industries,'active_jobs'=> $activeJobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('dashboard.admin.jobs.industries.add-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Industry::create($validated);

        return redirect()->route('admin.industries.index');
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
    public function edit($slug)
    {
        $industry = Industry::where('slug',$slug)->firstOrFail(); 
        
        return view('dashboard.admin.jobs.industries.edit', compact('industry') );
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
        $industry = Industry::findOrFail($id);
        
        $validated = $request->validate(['name'=>'required']);

        $industry->update($validated);

        return redirect()->route('admin.industries.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Industry::where('id',$id)->first()->delete();

        return redirect()->back()->withSuccess('Industry has been Deleted successfully');
    }
}
