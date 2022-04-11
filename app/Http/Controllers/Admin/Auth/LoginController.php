<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Auth\Events\Lockout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
        $this->ensureIsNotRateLimited($request);
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:4|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( auth('admin')->attempt($creds) ){

             return redirect()->route('admin.dashboard');
         }else{
             RateLimiter::hit($this->throttleKey());
             throw ValidationException::withMessages([
                 'email' => __('auth.failed'),
             ]);
            //  return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
        //  RateLimiter::clear($this->authorize());
    }

    public function logout(){
        auth()->guard()->logout();
        return redirect('/');
    }

    public function throttleKey()
    {
        return Str::lower(request()->email).'|'.request()->ip();
    }

    public function ensureIsNotRateLimited(Request $request)
    {
        if(!RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return;
        }

        event(new Lockout($request));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle',[
                'seconds'  => $seconds,
                'minutes'  => ceil($seconds/60),

            ]),
        ]);

    }

}
