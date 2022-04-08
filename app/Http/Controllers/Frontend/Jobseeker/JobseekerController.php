<?php

namespace App\Http\Controllers\Frontend\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|unique:jobseekers,username',
            'phone_no' => 'required|regex:/(98)[0-9]{8}/',
            'email' => 'required|email|unique:jobseekers,email',
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:6048'],
            'password' => 'required|min:4|max:30',
            'cpassword' => 'required|min:4|max:30|same:password',

        ]);

        // if(isset($request->image)) {
        //     $imgName = $request->image->getClientOriginalName().time();
        //     $request->image->move(public_path('images'), $imgName);
        // }else{
        //     $imgName='dummy.png';
        // }
        $validated = array_replace
        (
            $validated,
            [
                'password' => Hash::make($request->password),
                // 'image' => $imgName,
            ]
        );

        // dd($validated);
        
        Jobseeker::create($validated);

        return redirect('/jobseeker/login');
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
