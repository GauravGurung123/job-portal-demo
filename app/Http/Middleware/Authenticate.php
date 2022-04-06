<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
        
            if($request->routeIs('admin.*')){
                if (Auth::guard('admin')->check()) {
                    return route('admin.home');
                } else {
                    return route('admin.login');
                }
                
            }

            if($request->routeIs('employer.*')){
                if (Auth::guard('employer')->check()) {
                    return route('employer.home');
                } else {
                    return route('employer.login');
                }
            }

            if($request->routeIs('jobseeker.*')){
                if (Auth::guard('jobseeker')->check()) {
                    return route('jobseeker.home');
                } else {
                return route('jobseeker.login');
               }
            }

            return redirect('/');
        }

    }
}
