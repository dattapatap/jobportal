<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        if(Auth::check() && Auth::user()->role_id == 1 ){
            $this->redirectTo = route('admin.dashboard');
        } else if(Auth::check() && Auth::user()->role_id == 2 ){
            $this->redirectTo = route('recruiter.dashboard');
        }else if(Auth::check() && Auth::user()->role_id == 3 ){
            $this->redirectTo = route('employee.dashboard');
        }else{
            $this->redirectTo = route('login');
        }

        $this->middleware('guest')->except('logout');

    }
}
