<?php

namespace App\Http\Controllers\Admin\Dashboard\Location;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeJobs = Job::where('status', 'Active')->get();
        return  view('dashboard.admin.jobs.locations.index',
 [   
            'locations'=>Location::with('employers')->withCount(['jobs'])->paginate(10),
            'active_jobs'=>$activeJobs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.jobs.locations.add-new');
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
            'name' => 'required',
        ]);

        Location::create($validated);

        return redirect()->route('admin.locations.index');
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
        $location = Location::where('slug',$slug)->firstOrFail(); 
        
        return view('dashboard.admin.jobs.locations.edit', compact('location') );

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
        $location = Location::findOrFail($id);
        
        $validated = $request->validate(['name'=>'required']);

        $location->update($validated);

        return redirect()->route('admin.locations.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::where('id',$id)->first()->delete();
        return redirect()->back()->withSuccess('Location has been Deleted successfully');
    }
}
