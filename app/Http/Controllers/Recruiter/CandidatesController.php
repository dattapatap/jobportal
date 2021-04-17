<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employee\Interest;
use App\Models\JobPositions;
use App\Models\Jobs;
use App\Models\Recruiter;
use App\Models\Skills;
use App\Models\User;
use \DB;
use App\Notifications\RecruiterInteres;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Symfony\Component\Console\Input\Input;

class CandidatesController extends Controller
{
    public function index(){
       $getJobsIndustry = DB::table('jobs')->where('rec_id', Auth::user()->recruiter->id)->distinct()->get("job_industry")->pluck('job_industry')->toArray();
       $positions = JobPositions::where('deleted_at', null)->get();
       $skills = Skills::where('deleted_at', null)->get();
       $intrest = Interest::select('emp_id')->where('rec_id', Auth::user()->recruiter->id)->distinct()->pluck('emp_id')->toArray();

       $candidates = Employee::with('userskills.skills')
                               ->select('employee.id', 'employee.user_id', 'u.avatar','employee.first_name','employee.last_name','ec.current_ctc','ec.expected_ctc','c.name As location',
                                       'j.name As position','ec.experience_year','ec.experience_month')
                               ->join('emp_careers As ec', 'ec.emp_id', '=', 'employee.id')
                               ->join('industries As is', 'is.id', '=', 'ec.industry')
                               ->join('job_positions As j', 'j.id', '=', 'ec.position')
                               ->join('cities As c', 'c.id', '=', 'ec.location_prefered')
                               ->join('users As u', 'u.id', '=', 'employee.user_id')
                               ->orWhereIn('ec.industry', $getJobsIndustry)
                               ->distinct()
                               ->paginate(20);
       return view('recruiter.candidates', compact('positions', 'skills', 'candidates','intrest'));
    }

    public function search(Request $request){
        if(isset($request->skills)){
            $arraSkills = $request->skills;
        }else{
            $arraSkills = array();
        }

        if(isset($request->positions))
            $position = $request->positions;
        else
            $position = '';


        $candidates = Employee::select('employee.id', 'employee.user_id', 'u.avatar','employee.first_name','employee.last_name','ec.current_ctc','ec.expected_ctc','c.name As location',
                            'j.name As position','ec.experience_year','ec.experience_month')
                    ->whereIn('usk.skill_id', $arraSkills)
                    ->orWhere('j.id', $position)
                    ->with('userskills.skills')
                    ->join('emp_careers As ec', 'ec.emp_id', '=', 'employee.id')
                    ->join('industries As is', 'is.id', '=', 'ec.industry')
                    ->join('job_positions As j', 'j.id', '=', 'ec.position')
                    ->join('cities As c', 'c.id', '=', 'ec.location_prefered')
                    ->join('users As u', 'u.id', '=', 'employee.user_id')
                    ->join('userskills As usk', 'usk.emp_id', '=', 'employee.id')
                    ->distinct()
                    ->paginate(20);

            $intrest = Interest::select('emp_id')->where('rec_id', Auth::user()->recruiter->id)->distinct()->pluck('emp_id')->toArray();
            $positions = JobPositions::where('deleted_at', null)->get();
            $skills = Skills::where('deleted_at', null)->get();
            return view('recruiter.candidates', compact('positions', 'skills', 'candidates','intrest'));
    }


    public function showInterest(Request $request){
        $employee = Employee::findOrFail($request->post('data'));
        if($employee){
                $recruiter = Auth::user()->recruiter;
                $interest = new Interest;
                $interest->emp_id = $employee->id;
                $interest->rec_id = $recruiter->id;
                $interest->save();
                $user = User::find(1);
                $user->notify( new RecruiterInteres($recruiter->company_name, $employee->first_name.' '.$employee->last_name ));
                return response()->json(['success' => 'Interest saved successfully']);
        }
        else{
            return response()->json(['error' => 'somthing went wrong, please try again']);
        }
    }

}


