<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function show() {
        return view('dashboard.admin.login');
    } 
        
    /**
     * check
     *
     * @param  mixed $request
     * @return void
     */
    function loginProcess(Request $request){
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( auth('admin')->attempt($creds) ){

             return redirect()->route('admin.home');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        auth()->guard('admin')->logout();
        return redirect('/');
    }
}
