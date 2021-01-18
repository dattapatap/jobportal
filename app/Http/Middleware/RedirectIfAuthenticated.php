<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guards = empty($guards) ? [null] : $guards;

        if (Auth::guard($guards)->check() && Auth::user()->role_id == 1) {
            return redirect()->route('admin.dashboard');
        } 
        else if(Auth::guard($guards)->check() && Auth::user()->role_id == 2)
        {
            return redirect()->route('recruiter.dashboard');
        }
        else if(Auth::guard($guards)->check() && Auth::user()->role_id == 3)
        {
            return redirect()->route('employee.dashboard');
        }
        else 
        {
            return $next($request);
        }

    }
}
