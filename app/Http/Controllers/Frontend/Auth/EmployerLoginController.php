<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerLoginController extends Controller
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
            'email'=>'required|email|exists:employers,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in employers record'
         ]);

         $creds = $request->only('email','password');

         if( auth('employer')->attempt($creds) ){

             return redirect()->route('employer.home');
         }else{
             return redirect()->route('employer.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        auth()->guard()->logout();
        return redirect('/');
    }
}
