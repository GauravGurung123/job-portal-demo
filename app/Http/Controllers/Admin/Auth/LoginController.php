<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Auth\Events\Lockout;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    function show() {
        return view('dashboard.admin.login');
    } 

    public function showForgotForm()
    {
        return view('dashboard.admin.forgot');        
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:admins,email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('admin.reset-pwd-form', ['token' => $token, 'email' => $request->email]);
        $body = "We have recieved a request to reset the password for your account associated with ".$request->email.". You can reset your password by clicking the link below";

        // Mail::send('email-forgot',['action_link' => $action_link, 'body' => $body],
        //      function($message) use($request){
        //         $message->from('noreply@test.com', 'Job Portal Test');
        //         $message->to($request->email, 'Admin Name')
        //                 ->subject('Reset Password);
        // });

        Mail::send('dashboard.admin.reset-password.email-forgot', ['action_link' => $action_link, 'body' => $body],
         function ($message) use($request){
            $message->from('noreply@test.com', 'John Doe');
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to($request->email, 'Admin John Doe');
            $message->subject('Reset Password');
            
        });
        return back()->with('success', 'We have emailed your password reset link');
    }

    public function showResetPasswordForm(Request $request, $token = null)
    {
        return view('dashboard.admin.reset-password.reset')->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function resetPasswordNow(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:4',
            'cpassword' => 'required|same:password',
        ]);

        $checkToken = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$checkToken) {
            return back()->withInput()->with('fail', 'Invalid Token');
        } else {
            Admin::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where(['email' => $request->email])->delete();
            return redirect()->route('admin.login')->with('info', 'Your password has been changed! you can login with new password');
        }
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
