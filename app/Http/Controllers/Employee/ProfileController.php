<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Educations;
use App\Models\EmpCareer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Experience;
use App\Models\Skills;
use App\Models\Userskills;
use Carbon\Carbon;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $skills = Skills::all();
        $user = Auth::user();
        $employee = Auth::user()->employee;
        $educations = (Auth::user()->employee)?Auth::user()->employee->careers:'';
        $educations = (Auth::user()->employee)?Auth::user()->employee->educations:'';
        $experience = (Auth::user()->employee)?Auth::user()->employee->experience:'';
        $userskills = (Auth::user()->employee)?Auth::user()->employee->userskills->toArray():'';
        return view('employee.profile.profile')->with(compact('skills', 'user', 'employee', 'educations', 'experience', 'userskills'));
    }

    public function editprofile($id){
        $employee = DB::table('employee')
                    ->select('employee.id','employee.first_name','employee.last_name', 'employee.gender', 'employee.dob'
                    ,'employee.address', 'users.email', 'users.mobile')
                    ->join('users','users.id','=','employee.user_id')
                    ->where(['employee.id' => $id])
                    ->first();
        return response()->json($employee);
    }

    public function updateProfile(Request $request){
        $validValues = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string' 
        ]);
        try{           
         DB::beginTransaction();
         $employee = Employee::where('id', $request->emp_id)
                    ->update(['first_name'=> $request->first_name,'last_name'=> $request->last_name, 'dob'=> $request->dob, 'gender'=> $request->gender, 'address'=>$request->address ]);

                    $userid = Auth::user()->id;
                    User::where('id',$userid)
                          ->update(['mobile'=>$request->mobile, 'email'=>$request->email ]);

                    DB::commit();
                    return response()->json(['code'=>200, 'message'=>'Profile updated successfully','data' => $employee], 200);        
        }catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062' )
                return response()->json(['code'=>203, 'message'=>'Duplicate Mobile/Email'], 203);
            else
                return response()->json(['code'=>202, 'message'=>'Profile not updated, please try again'], 202);    
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['code'=>202, 'message'=>'Profile not updated, please try again','data' => $employee], 202);
        }
    }


    public function updatedProfile(Request $request)
    {
        $formContent = $request->all();
        $profiles = json_decode($formContent['profile'], true); 
        $emp_id = -1;
        $array_eductions = $profiles['educations'];
        $array_exp = $profiles['experience'];
        $array_skills = $profiles['skills'];

        $user_id = Auth::user()->id;
        if($emp_id == -1){
            DB::beginTransaction();
            try{
                $employee = $this->createEmployee($profiles, $user_id);
                $this->createEducations($array_eductions, $employee->id);
                $this->createExperience($array_exp, $employee->id);
                $this->createSkills($array_skills, $employee->id);
                $this->updateUser($profiles, $user_id);
                $this->addResumeWithProfile( $request,$formContent, $user_id);
                DB::commit();
            }catch(Exception $e){
                DB::rollback();
                throw $e;
            }
            return response()->json("Profile Created");

        }else{
            //Update Profile
            DB::beginTransaction();
            try{
                $employee = $this->updateEmployee($profiles);
                $this->updateEducations($array_eductions, $employee->id);
                $this->updateExperience($array_exp, $employee->id);
                $this->updateSkills($array_skills, $employee->id);
                $this->updateUser($profiles, $user_id);
                // $this->addResumeWithProfile($formContent, $user_id);

                DB::commit();
            }catch(Exception $e){
                DB::rollback();
                echo $e->getLine();
                throw $e;
            }


        }
        // return response()->json("Profile Controller");
        // dd($request->all());
    }

    public function createEmployee($profiles, $user){
        $first_name =  $profiles['first_name'];       
        $email =  $profiles['email'];
        $proffession =  $profiles['proffesion'];
        $currentctc =  $profiles['currentctc'];
        $location =  $profiles['locationPref'];
        $last_name =  $profiles['last_name'];
        $expYear =  $profiles['expYear'];
        $expMonth =  $profiles['expMonth'];
        $phone =  $profiles['phone'];
        $expectedCtc =  $profiles['expectedctc'];
        $noticeperiod =  $profiles['noticeperiod'];

        $user = Employee::create([
            'first_name' => $first_name,'last_name' => $last_name,'user_id' => $user,'proffession' => $proffession,'experience_year' => $expYear,
            'experience_month' => $expMonth,'current_ctc' => $currentctc,'expected_ctc' => $expectedCtc,'location_prefered' => $location,
            'notice_period' => $noticeperiod
        ]);
        return $user;
    }
    public function createEducations($array_eductions, $empid){
        for($ctr=0; $ctr < count($array_eductions); $ctr++){
                $single_edu = $array_eductions[$ctr];

                $education = new Educations();
                $education->emp_id = $empid;
                $education->institude_name = $single_edu['institude'];
                $education->qualification = $single_edu['qualification'];
                $education->frm_date = $single_edu['from'];
                $education->to_date = $single_edu['to'];
                $education->university = $single_edu['university'];
                $education->percent = $single_edu['percent'];
                $education->save();
        }
    }
    public function createExperience($array_exp, $empid){
        for($ctr=0; $ctr < count($array_exp); $ctr++){
            $single_exp = $array_exp[$ctr]; 
            $exp =new Experience();
            $exp->emp_id = $empid;
            $exp->company_name = $single_exp['company'];
            $exp->position = $single_exp['position'];
            $exp->is_current = $single_exp['is_cuttent'];
            $exp->from_date = (new Carbon('01-'.$single_exp['from']))->format('Y-m-d');
            $exp->to_date = (new Carbon('01-'.$single_exp['to']))->format('Y-m-d');
            $exp->location = $single_exp['expLocation'];
            $exp->save();
        }
    }
    public function createSkills($array_skills, $empid){
        for($ctr=0; $ctr < count($array_skills); $ctr++){
            Userskills::create([
                    'emp_id' => $empid,
                    'skill_id' =>1    //$array_skills[$ctr]
            ]);
        }
    }
    public function updateUser($profiles, $user_id){
        User::where('id', $user_id)
             ->update(['name' => $profiles['first_name'].' '.$profiles['last_name'],'email'=> $profiles['email'], 'mobile' => $profiles['phone'] ]);
    }
    public function addResumeWithProfile($request,$formContent, $user_id){

        if($request->hasFile('avtar') && $request->hasFile('resume')){
               
            $avtar = $request->avtar->getClientOriginalName();
            $resume = $request->resume->getClientOriginalName();
            if(Auth::user()->avatar){
                Storage::delete('/public/images/profiles/'.Auth::user()->avatar);
            }

            if(Auth::user()->employee->resume){
                Storage::delete('/public/files/resumes/'.Auth::user()->employee->resume);
            }
            $request->avtar->storeAs('images/profiles', Auth::user()->id.'_'.$avtar, 'public');
            $user = Auth::user();
            $user->avatar = $user_id.'_'. $avtar ;
            $user->save();

            $request->avtar->storeAs('files/resumes', Auth::user()->id.'_'.$resume, 'public');
            $emp = Auth::user()->employee;
            $emp->resume = $user_id.'_'. $resume ;
            $emp->save();

        }


    }


}
