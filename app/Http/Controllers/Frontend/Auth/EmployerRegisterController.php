<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Industry;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{

    public function __construct()
    {   
        $this->middleware('auth:employer', ['only'=>['edit','`update','delete']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.frontend.employer.register', ['locations'=>Location::all(), 'industries' => Industry::all()]);
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
            'username' => 'required|min:3|unique:employers,username',
            'org_name' => 'required|min:3',
            // 'phone_no' => 'required|regex:/(98)[0-9]{8}/',
            'email' => 'required|email|unique:employers,email',
            // 'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:6048'],
            'password' => 'required|min:4|max:30',
            'cpassword' => 'required|min:4|max:30|same:password',
            'industry_id' => 'required|integer',
            'location_id' => 'required|integer',

        ]);

        if(isset($request->image)) {
            $imgName = $request->image->getClientOriginalName().time();
            $request->image->move(public_path('images'), $imgName);
        }else{
            $imgName='dummy.png';
        }
        $validated = array_replace
        (
            $validated,
            [
                'password' => Hash::make($request->password),
                'profile_photo_path' => $imgName,
            ]
        );

        // dd($validated);
        
        Employer::create($validated);

        return redirect('/');
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
