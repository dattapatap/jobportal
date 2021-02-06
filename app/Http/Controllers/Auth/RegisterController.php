<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Recruiter;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo;
    public function __construct()
    {
        // $this->middleware('guest');

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
            'mobile' => 'required|numeric|max:9999999999|unique:users',
            'password' => 'required|string|min:8|confirmed',            
            'password_confirmation' => 'required',
        ]);
        try{
            $user = User::create([
                        'name' => $request->name,
                        'role_id' => 3,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'password' => Hash::make($request->password),
                    ]);       

            Employee::create([
                'first_name' => $request->name,
                'user_id' => $user->id
            ]);
            Auth::login($user);
            return redirect()->to('employee/dashboard');
        }catch(Exception $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
                session()->flash('error',"Duplicate Entry of Email/Mobile");
            else
                session()->flash('error',"Invalid details, Please try again");
            return redirect()->back()->withInput();
        }
    }

    public function recruiterRegisetrShow(){
        return view('Auth.recruiter-register');
    }
    public function recruiterRegister(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|max:9999999999|unique:users',
            'password' => 'required|string|min:8|confirmed',            
            'password_confirmation' => 'required',
        ]);

        try{            
            $user = User::create([
                        'name' => $request->name,
                        'role_id' => 2,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'password' => Hash::make($request->password),
                    ]);       

            Recruiter::create([
                'company_name' => $request->name,
                'user_id' => $user->id
            ]);
            Auth::login($user);
            return redirect()->to('recruiter/dashboard');
        }catch(Exception $e){
             $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
                session()->flash('error',"Duplicate Entry of Email/Mobile");
            else
                session()->flash('error',"Invalid details, Please try again");
            return redirect()->back()->withInput();
        }
    }


}
