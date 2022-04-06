<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobseekerLoginController extends Controller
{
    function show() {
        return view('dashboard.frontend.login');
    } 
        
    /**
     * check
     *
     * @param  mixed $request
     * @return void
     */
    function loginProcess(Request $request){
         $request->validate([
            'email'=>'required|email|exists:jobseekers,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in jobseekers record'
         ]);

         $creds = $request->only('email','password');

         if( auth('jobseeker')->attempt($creds) ){

             return redirect()->route('jobseeker.home');
         }else{
             return redirect()->route('jobseeker.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        auth()->guard('jobseeker')->logout();
        return redirect('/');
    }
}
