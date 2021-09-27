<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Recruiter;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\AdminRegister;
use App\Notifications\UserRegistration;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Node\FunctionNode;

class RegisterController extends Controller
{
    use RegistersUsers;
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'min:10','numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['registerType']==='RECRUITER')
                $role = '2';
        else if($data['registerType']==='EMPLOYEE')
                 $role = '3';
        else
            abort(403, 'Unauthorized action.');

        return User::create([
            'name' => $data['name'],
            'role_id' => $role,
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);
    }


    protected function employeeRegister(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'role_id' => 3,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
            ]);

            $employee = Employee::create([
                'first_name' => $request->name,
                'user_id' => $user->id,
                'registerd_date' => Carbon::now(),
            ]);

            $user->notify(new UserRegistration($user));
           
            $admin = User::find(1);
            $admin->notify(new AdminRegister($user));

            DB::commit();

            Auth::login($user);
            return redirect()->to('employee/dashboard');
        }catch(\Exception $e){
            DB::rollBack();
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
                session()->flash('error',"Duplicate Entry of Email/Mobile");
            else
                session()->flash('error',"Invalid details, Please try again");

            return redirect()->back()->withInput();
        }
    }

    public function recruiterRegisetrShow(){
        return view('auth.recruiter-register');
    }
    public function recruiterRegister(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        try{
            DB::beginTransaction();

            $user = User::create([
                        'name' => $request->name,
                        'role_id' => 2,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'password' => Hash::make($request->password),
                    ]);
            $recruiter = Recruiter::create([
                            'company_name' => $request->name,
                            'user_id' => $user->id
                         ]);


                         $user->notify(new UserRegistration($user));
                         $admin = User::find(1);
                         $admin->notify(new AdminRegister($user));

            DB::commit();
            Auth::login($user);
            return redirect()->to('recruiter/dashboard');
        }catch(Exception $e){
             DB::rollBack();
             $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
                session()->flash('error',"Duplicate Entry of Email/Mobile");
            else
                session()->flash('error',"Invalid details, Please try again");
            return redirect()->back()->withInput();
        }
    }


}
