<?php

namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployerController extends Controller
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
    public function show($username)
    {
        $employer = Employer::where('username', $username)->first();

        return view('dashboard.admin.users.employer.edit_employer', compact('employer'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $employer = Employer::where('username', $username)->first();

        return view('dashboard.admin.users.employer.edit_employer', compact('employer'));  
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
        $employer = Employer::findOrFail($id);

        $validatedData = $request->validate([
            'username' => ['required', Rule::unique('employers')->ignore($employer->id),],
            'org_name' => 'required|min:3',
            'email' => 'required',Rule::unique('employers', 'email')->ignore($employer->id),
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:6048'],
        ]);
        
        if(isset($request->image)) {
            $imgName = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imgName);
            $validatedData['profile_photo_path'] = $imgName;
        }else{
            $validatedData['profile_photo_path'] = 'dummy.png';
        }

        $employer->update($validatedData);

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
        $admin = Employer::findOrFail($id);
        $admin->delete();
        return redirect('admin/dashboard/users');
    }
}
