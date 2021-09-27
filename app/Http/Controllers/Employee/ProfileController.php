<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Models\City;
use App\Models\Education;
use App\Models\Educations;
use App\Models\EmpAudit;
use App\Models\EmpCareer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmpOrganisation;
use App\Models\Experience;
use App\Models\Industries;
use App\Models\JobPositions;
use App\Models\Organisation;
use App\Models\Skills;
use App\Models\Userskills;
use Carbon\Carbon;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        $skills = Skills::where('deleted_at',null)->get();
        $industry = Industries::where('deleted_at',null)->get();
        $positions = JobPositions::where('deleted_at',null)->get();
        $city = City::where('deleted_at',null)->get();
        $education = Education::where('deleted_at',null)->get();
        $audit = Audit::where('deleted_at',null)->with('countries')->get();
        $orgs = Organisation::where('deleted_at',null)->get();

        $user = User::where('id' , Auth::user()->id)
                          ->with('employee')
                          ->first();
        $emp =  Employee::where('id', $user->employee->id)
                         ->with('careers.industries','careers.locations', 'careers.positions')
                         ->with('educations.educ','educations.cour', 'educations.spec' )
                         ->with('experience.loations')
                         ->with('userskills.userskills')
                         ->with('empAudits.audits.countries')
                         ->with('empOrgnisations.organisation')
                         ->first();

        return view('employee.profile.profile')->with(compact('skills','industry', 'positions','city', 'user', 'emp', 'education', 'audit', 'orgs'));

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
            'dob' => 'required|date|before:-18 years',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'mobile' => 'required|min:10|numeric|unique:users,mobile,'.Auth::user()->id,
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
                    $request->session()->flash('success',"Profile updated successfully");
                    return response()->json(['code'=>200, 'message'=>'Profile updated successfully','data' => $employee], 200);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['code'=>202, 'message'=>'Profile not updated, please try again','data' => $employee], 202);
        }
    }


    public function addCareear(Request $request){
        $validValues = $request->validate([
            'industry' => 'required|numeric',
            'position' => 'required|numeric',
            'jobtype' => 'required|string',
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'currctc' => 'required|numeric|between:0,99.99',
            'expctc' => 'required|numeric|between:0,99.99',
            'location' => 'required|numeric'
        ]);
        try{

         if($request->post('career_id') == -1){
            $empCareear = new EmpCareer;
            $msg ='Career Detail added successfully';
         }else{
            $empCareear = EmpCareer::find($request->post('career_id'));
            $msg ='Career Detail Updated successfully';
         }
         $empCareear->emp_id = Auth::user()->employee->id;
         $empCareear->industry = $request->industry;
         $empCareear->position = $request->position;
         $empCareear->job_type = $request->jobtype;
         $empCareear->experience_year = $request->year;
         $empCareear->experience_month = $request->month;
         $empCareear->current_ctc = $request->currctc;
         $empCareear->expected_ctc = $request->expctc;
         $empCareear->location_prefered = $request->location;
         $empCareear->save();

         $request->session()->flash('success', $msg);
         return response()->json(['code'=>200, 'message'=> $msg ,'data' => $empCareear], 200);
        }catch(Exception $e){
            return response()->json(['code'=>202, 'message'=>'Career not updated, please try again','data' => $empCareear], 202);
        }
    }
    public function editcareer($id){
        $empCareer = EmpCareer::where('id', $id)->first();
        return response()->json(['status'=>true, 'data' => $empCareer]);
    }


    public function addEducations(Request $request){
        $validValues = $request->validate([
            'education' => 'required|numeric',
            'qualification' => 'required|numeric',
            'specification' => 'required|numeric',
            'institude' => 'required|string',
            'courseType' => 'required|string',
            'passingyear' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'percent' => 'required|numeric|between:0,99.99',
        ]);
        try{

         if($request->post('edu_id') == -1){
            $edu = Educations::where('education', $request->post('education'))
                                ->where('emp_id', Auth::user()->employee->id)
                                ->get();

            foreach ($edu as $eduItems) {
                if($request->post('education') == $eduItems->education){
                    return response()->json(['code'=>202, 'message'=>'Education alredy exist, Please update perticuler education'], 202);
                }
            }
            $empeducation = new Educations;
            $msg ='Education Detail added successfully';
         }else{
            $empeducation = Educations::find($request->post('edu_id'));
            $msg ='Education Detail Updated successfully';
         }
         $empeducation->emp_id = Auth::user()->employee->id;
         $empeducation->education = $request->post('education');
         $empeducation->qualification = $request->post('qualification');
         $empeducation->specification = $request->post('specification');
         $empeducation->institude = $request->post('institude');
         $empeducation->coursetype = $request->post('courseType');
         $empeducation->passingyear = $request->post('passingyear');
         $empeducation->percent = $request->post('percent');
         $empeducation->save();

         $request->session()->flash('success', $msg);
         return response()->json(['code'=>200, 'message'=> $msg ,'data' => $empeducation], 200);
        }catch(Exception $e){
            return response()->json(['code'=>202, 'message'=>'Education not updated, please try again','data' => $empeducation], 202);
        }
    }
    public function editeducation($id){
        $empEducation = Educations::where('id', $id)->first();
        return response()->json(['status'=>true, 'data' => $empEducation]);
    }

    public function addExperience(Request $request){
        if($request->has('iscutrrent')){
            $val ='nullable';
            $to = 'Present';
        }else{
            $to = $request->post('to');
            $val ='required|date|before:today|after:from';
        }

       $validValues = $request->validate([
            'company' => 'required|string',
            'expposition' => 'required|string',
            'from' => 'required|date',
            'to' => $val,
            'explocation' => 'required|numeric'
        ]);
        try{

         if($request->post('exp_id') == -1){
            $empExop = new Experience;
            $msg ='Education Detail added successfully';
         }else{
            $empExop = Experience::find($request->post('exp_id'));
            $msg ='Experience Detail Updated successfully';
         }
            $empExop->emp_id = Auth::user()->employee->id;
            $empExop->company_name = $request->post('company');
            $empExop->position = $request->post('expposition');
            $empExop->is_current = $request->has('iscutrrent');
            $empExop->from_date = $request->post('from');
            $empExop->to_date = $to;
            $empExop->location = $request->post('explocation');
            $empExop->save();

            $request->session()->flash('success', $msg);
            return response()->json(['code'=>200, 'message'=> $msg ,'data' => $empExop], 200);
        }catch(Exception $e){
            echo $e->getMessage();
            return response()->json(['code'=>202, 'message'=>'Experience not updated, please try again','data' => $empExop], 202);
        }
    }
    public function editexperience($id){
        $empExp = Experience::where('id', $id)->first();
        return response()->json(['status'=>true, 'data' => $empExp]);
    }

// Skills
    public function addSkills(Request $request){
        $skills = $request->post('skills');
        if(!$skills){
            return response()->json(['code'=>202, 'message'=>'Skills not updated, please try again'], 202);
        }

            foreach ($skills as $skill) {
                        $ifExist = Userskills::where('skill_id', $skill['value'])
                                            ->where('emp_id', Auth::user()->employee->id)
                                            ->first();
                        if(!$ifExist){
                            $empSkills = new Userskills;
                            $empSkills->emp_id = Auth::user()->employee->id;
                            $empSkills->skill_id = $skill['value'];
                            $empSkills->save();
                        }

            }

            $request->session()->flash('success', "Skills Added");
            return response()->json(['code'=>200, 'message'=> "Skills Added"] , 200);
        }

    public function deleteSkills(Request $request){
           $skill = $request->post('skillid');

           $empExp = Userskills::find($skill)->delete();
           return response()->json(['status'=>true, 'message' => "Skill Removed"]);
    }

    //Audits
    public function addAudit(Request $request){
        $user = Auth::user()->employee;
        $audit = $request->post('audits');
        if(!$audit){
            return response()->json(['code'=>202, 'message'=>'Audit not updated, please try again'], 202);
        }
        foreach ($audit as $audits) {
            $ifExist = EmpAudit::where('audit', $audits['value'])
                                ->where('emp_id', $user->id )
                                ->first();
            if(!$ifExist){
                $empAudit = new EmpAudit();
                $empAudit->emp_id = $user->id;
                $empAudit->audit = $audits['value'];
                $empAudit->save();
            }
        }
        $request->session()->flash('success', "Audit Added");
        return response()->json(['code'=>200, 'message'=> "Audit Added"] , 200);
    }
    public function deleteAudit(Request $request){
           $audit = $request->post('auditid');

           $empaud = EmpAudit::find($audit)->delete();
           return response()->json(['status'=>true, 'message' => "Audit Removed"]);
    }

    //Organisations
    public function addorganisation(Request $request){
        $user = Auth::user()->employee;
        $orgs = $request->post('orgs');
        if(!$orgs){
            return response()->json(['code'=>202, 'message'=>'Organisation not updated, please try again'], 202);
        }
        foreach ($orgs as $org) {
            $ifExist = EmpOrganisation::where('org_id', $org['value'])
                                ->where('emp_id', $user->id )
                                ->first();
            if(!$ifExist){
                $empOrgs = new EmpOrganisation();
                $empOrgs->emp_id = $user->id;
                $empOrgs->org_id = $org['value'];
                $empOrgs->save();
            }
        }
        $request->session()->flash('success', "Organisations Added");
        return response()->json(['code'=>200, 'message'=> "Organisations Added"] , 200);
    }
    public function deleteorganisation(Request $request){
           $org = $request->post('orgid');

           $emporg = EmpOrganisation::find($org)->delete();
           return response()->json(['status'=>true, 'message' => "Organisation Removed"]);
    }




//Upload Resume
    public function uploadResume(Request $request){
        $validation = $request->validate([
            'empresume'=> 'required|mimes:pdf,doc,docs|max:1048',
        ]);
        if($request->hasFile('empresume')){

            $resume = $request->empresume->getClientOriginalName();
            if(Auth::user()->employee->careers->resume){
                Storage::delete('/public/files/resumes/'.Auth::user()->employee->careers->resume);
            }
            $request->empresume->storeAs('files/resumes', Auth::user()->employee->id.'_resume_'.$resume, 'public');
            $emp = Auth::user()->employee->careers;
            $emp->resume = Auth::user()->employee->id.'_resume_'.$resume ;
            $emp->save();
            $request->session()->flash('success','Resume Uploaded');
            return response()->json(['code'=>200, 'message'=> "Resume Uploaded"], 200);
        }
    }
// Upload Profil pic
    public function uploadProfile(Request $request ){

        if ($request->hasFile('profile_pic')) {
            if ($request->file('profile_pic')->isValid()) {

                $validated = $request->validate([
                    'profile_pic' => 'mimes:jpeg,png|max:1024',
                ]);
                $file = $request->file('profile_pic');
                $filename = $file->getClientOriginalName();
                $image_resize = Image::make($file->getRealPath());
                $image_resize->resize(300, 300);

                $user = Auth::user();

                if($user->avatar){
                    Storage::delete('/public/images/profiles/'.Auth::user()->avatar);
                }
                if (!file_exists(public_path().'/storage/images/profiles')) {
                    mkdir(public_path().'/storage/images/profiles', 666, true);
                }

                $image_resize->save(public_path().'/storage/images/profiles/' .$user->id.'_'.$filename);

                $user->avatar = $user->id.'_'.$filename;
                $user->save();
                return response()->json(['success' => 'Your profile has been successfully Upload']);
            }
            return response()->json(['error' => 'Your profile not Uploaded']);
        }
    }

}
