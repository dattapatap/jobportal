<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Recruiter;
use App\Models\User;
use App\Notifications\UserRegistration;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

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


    public function empLogin(Request $request){
        $validator = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
            ]);
            if (Auth::attempt($validator)) {
                if(Auth::user()->role_id == 3){
                    return redirect()->route('employee.dashboard');
                }else{
                    $this->guard()->logout();
                    return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials')->withInput();
                }
            }else{
              return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials')->withInput();
            }
    }

    public function recruiterLoginShow(){
        return view('auth.recruiter-login');
    }
    public function recruiterLogin(Request $request){
        $validator = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($validator)) {
            if(Auth::user()->role_id == 2){
                return redirect()->route('recruiter.dashboard');
            }else{
                $this->guard()->logout();
                return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials')->withInput();
            }
        }else{
           return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials')->withInput();
        }
    }
    public function adminLoginshow(){
        return view('auth.adminlogin');
    }
    public function adminLogin(Request $request){
        $validator = $request->validate([
                        'email' => 'required|string',
                        'password' => 'required|string'
        ]);
        if (Auth::attempt($validator)) {
            if(Auth::user()->role_id == 1){
                    return redirect()->route('admin.dashboard');
            }else{
                $this->guard()->logout();
                return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials')->withInput();
            }
        }else{
           return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials')->withInput();
        }
    }








    //Social Logins
    public function SocialRedirectEmployer($provider)
    {
        cache()->add('role', '2', 200);
        return Socialite::driver($provider)->redirect();
    }
    public function SocialRedirectEmp($provider)
    {
        cache()->add('role', '3', 200);
        return Socialite::driver($provider)->redirect();
    }

    public function SocialCallback($provider){
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $users = User::where(["social->{$provider}->id" => $userSocial->id, ])->first();
        if (!$users)
            $users = User::where(['email' => $userSocial->email,])->first();

        $role = Cache::get('role');
        if($users){
            if($users->role_id == $role){
                Auth::login($users);
                if(Auth::check() && Auth::user()->role_id == 2 ){
                    return redirect()->to('recruiter/dashboard');
                } else if(Auth::check() && Auth::user()->role_id == 3 ){
                    return redirect()->to('employee/dashboard');
                }
            }else{
                if($role == 2)
                    return redirect()->Route('recr-login')->with('error', 'Dont have permission of authenticate, Duplicate user');
                else
                    return redirect()->Route('login')->with('error', 'Dont have permission of authenticate, Duplicate user');
            }
        }else{
            if (!$userSocial->email) {
                if($role == 3)
                    return redirect()->Route('login')->with('error','email not not registered email not social');
                else
                    return redirect()->Route('recr-login')->with('error','email not not registered email not social');
            }
            try {
                DB::beginTransaction();

                $user = new User();
                $user->name = $userSocial->name;
                $user->email = $userSocial->email;
                $user->role_id = $role;
                $user->social =  json_encode([$provider => ['id' => $userSocial->id,]]);
                $user->save();

                if($user->role_id == 3){
                    DB::table('employee')->insert(['first_name'=> $user->name, 'user_id'=> $user->id, 'registerd_date'=> Carbon::now()]);
                }else if($user->role_id == 2){
                    DB::table('recruiters')->insert(['company_name'=> $user->name, 'user_id'=> $user->id]);
                }else{
                    return redirect()->Route('login')->with('error', 'Dont have permission of authenticate, duplicate user');
                }
                DB::commit();

                $user->notify(new UserRegistration($user));
                Auth::login($user);
                if(Auth::check() && Auth::user()->role_id == 2 )
                    return redirect()->to('recruiter/dashboard');
                else if(Auth::check() && Auth::user()->role_id == 3 )
                    return redirect()->to('employee/dashboard');
            }catch (Exception $e) {
                DB::rollback();
                echo $e->getMessage();
                if($role == 3)
                    return redirect()->Route('login')->with('error','Invalid Authenticate with duplicate user');
                else
                    return redirect()->Route('recr-login')->with('error','Invalid Authenticate with duplicate user');
            }
        }
    }


}
