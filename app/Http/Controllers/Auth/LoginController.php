<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{    
    use AuthenticatesUsers;
    protected $redirectTo;
    
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

    public function SocialRedirectEmployer($provider)
    {
        session()->put('role_id', "2");
        return Socialite::driver($provider)->redirect();
    }
    public function SocialRedirectEmp($provider)
    {
        session()->put('role_id', "3");
        return Socialite::driver($provider)->redirect();
    }


    public function SocialCallback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users = User::where(["social->{$provider}->id" => $userSocial->id, ])->first();

        if (!$users) 
            $users = User::where(['email' => $userSocial->email,])->first();
 
        $role = session()->get('role_id');
      
        if($users){
            Auth::login($users);
            if(Auth::check() && Auth::user()->role_id == 2 ){
                return redirect()->to('recruiter/dashboard');
            } else if(Auth::check() && Auth::user()->role_id == 3 ){
                return redirect()->to('employee/dashboard');
            }

        }else{

            try {
                $user = new User;
                $user->name = $userSocial->name;
                $user->email = $userSocial->email;
                $user->role_id = $role;
                $user->social =  json_encode([$provider => ['id' => $userSocial->id,]]);

                // Check support verify or not
                if ($user instanceof MustVerifyEmail) 
                        $user->markEmailAsVerified();

                $user->save();
                        
                Auth::login($user);            
                if(Auth::check() && Auth::user()->role_id == 2 )
                    return redirect()->to('recruiter/dashboard');
                else if(Auth::check() && Auth::user()->role_id == 3 )
                    return redirect()->to('employee/dashboard');

            }catch (Exception $e) {
                return redirect('login')->withErrors(['authentication_deny' => 'Login with '.ucfirst($provider).' failed. Please try again.']);
            }
        }


    }
}
