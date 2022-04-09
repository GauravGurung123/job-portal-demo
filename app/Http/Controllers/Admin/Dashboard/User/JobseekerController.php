<?php

namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobseekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($username)
    {
        $jobseeker = Jobseeker::where('username', $username)->first();

        return view('dashboard.admin.users.jobseeker.edit_jobseeker', compact('jobseeker'));   
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
        $jobseeker = Jobseeker::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'username' => ['required', Rule::unique('jobseekers')->ignore($jobseeker->id),],
            'email' => 'required',Rule::unique('jobseekers', 'email')->ignore($jobseeker->id),
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:6048'],
        ]);
        
        if(isset($request->image)) {
            $imgName = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imgName);
            $validatedData['profile_photo_path'] = $imgName;
        }else{
            $validatedData['profile_photo_path'] = 'dummy.png';
        }

        $jobseeker->update($validatedData);

        return redirect('admin/dashboard/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Jobseeker::findOrFail($id);
        $admin->delete();
        return redirect('admin/dashboard/users');
    }
}
