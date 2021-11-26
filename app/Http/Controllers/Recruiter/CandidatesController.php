<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\DeductPoint;
use App\Models\Employee;
use App\Models\Employee\Interest;
use App\Models\JobPositions;
use App\Models\Jobs;
use App\Models\Recruiter;
use App\Models\Skills;
use App\Models\PaymentSetting;
use App\Models\Payments;
use App\Models\EmpCareer;
use App\Models\User;
use App\Models\Employee\EmpTest;
use App\Models\EmployerPoints;
use \DB;
use App\Notifications\RecruiterInteres;
use App\Notifications\RecruiterViewProfile;
use App\Notifications\ResumeDownload;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Storage;
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

         if(isset($request->salary))
             $sal = $request->salary;
         else
             $sal = '';



         $candidates = Employee::select('employee.id', 'employee.user_id', 'u.avatar','employee.first_name','employee.last_name','ec.current_ctc','ec.expected_ctc','c.name As location',
                             'j.name As position','ec.experience_year','ec.experience_month')
                     ->whereIn('usk.skill_id', $arraSkills)
                     ->Where('j.id', $position)
                     ->where('ec.expected_ctc','<=', $sal )
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

    public function showInterest(Request $request)
    {
            $id= $request->post('data');
            $employee = Employee::findOrFail($request->post('data'));
            $recruiter = Auth::user()->recruiter;

            $paymntSet = PaymentSetting::find(1);
            $intr_amt = $paymntSet->prof_interest;
            $aval_points = EmployerPoints::where('rec_id',  $recruiter->id)->value('wallet_points');
            if($aval_points){
                if( round($intr_amt,2) <= round($aval_points,2) ){
                     $interest = new Interest;
                     $interest->emp_id = $employee->id;
                     $interest->rec_id = $recruiter->id;
                     $interest->save();
                     DB::table('points_deduction')->insert(['emp_id' => $id, 'rec_id' => $recruiter->id, 'deduction_type' => 3, 'deduction_points' => $intr_amt, 'status' => 1]);
                     $decrement = DB::table('employer_points')->where('rec_id',$recruiter->id);
                     $decrement->decrement('wallet_points', round($intr_amt,2));
                     $user = User::where('id', $employee->user_id)->first();
                     $user->notify(new RecruiterInteres($recruiter->company_name, $employee->first_name . ' ' . $employee->last_name));
                     return response()->json(['success' => 'Interest saved successfully']);
                }else{
                    return response()->json(['error' => 'Low balance please recharge your account']);
                }
            }else{
                return response()->json(['error' => 'Low balance please recharge your account']);
            }
    }

    public function view($id)
    {
        $employee = Employee::findOrFail($id);
        $recruiter = Auth::user()->recruiter;

        $paymntSet = PaymentSetting::find(1);
        $prof_amt = $paymntSet->prof_view;
        $aval_points = EmployerPoints::where('rec_id',  $recruiter->id)->value('wallet_points');

        $is_viewed = DeductPoint::where('emp_id', $id)->where('rec_id', $recruiter->id)->where('deduction_type', 1)->first();
        if($is_viewed == null){
            if($aval_points){
                if( round($prof_amt,2) <= round($aval_points,2) ){

                    DB::table('points_deduction')->insert(['emp_id' => $id, 'rec_id' => $recruiter->id, 'deduction_type' => 1, 'deduction_points' => $prof_amt, 'status' => 1]);
                    $decrement = DB::table('employer_points')->where('rec_id',$recruiter->id);
                    $decrement->decrement('wallet_points', round($prof_amt,2));

                    $user = User::where('id', $employee->user_id)->first();
                    $user->notify(new RecruiterViewProfile($recruiter->name, $employee->first_name . ' ' . $employee->last_name));
                }else{
                    return redirect()->back()->with('error', 'Low balance please recharge your account to open candidate');
                }
            }else{
               return redirect()->back()->with('error', 'Low balance please recharge your account to open candidate');
            }
        }

        $user = Employee::where('id', $id)
            ->with('user', 'userskills', 'experience', 'careers', 'educations', 'empAudits.audits', 'empOrgnisations')
            ->first();

        if ($user) {
            $tests = EmpTest::where('emp_id', $user->id)->get();
        } else {
            abort('404');
        }
        $user->test = $tests;
        return view('recruiter.candidate_profile', compact('user'));

    }

    public function downloadResume($id)
    {
        $employee = Employee::findOrFail($id);

        $recruiter = Auth::user()->recruiter;

        $paymntSet = PaymentSetting::find(1);
        $prof_amt = $paymntSet->prof_download;
        $aval_points = EmployerPoints::where('rec_id',  $recruiter->id)->value('wallet_points');

        $is_downloaded = DeductPoint::where('emp_id', $id)->where('rec_id', $recruiter->id)->where('deduction_type', 2)->first();

        $resume = $employee->careers->resume;
        if($resume == null){
            return redirect()->back()->with('error', "Candidate don't have resume uploaded");
        }

        if($is_downloaded == null){
            if($aval_points){
                if( round($prof_amt,2) <= round($aval_points,2) ){

                    DB::table('points_deduction')->insert(['emp_id' => $id, 'rec_id' => $recruiter->id, 'deduction_type' => 2, 'deduction_points' => $prof_amt, 'status' => 1]);
                    $decrement = DB::table('employer_points')->where('rec_id',$recruiter->id);
                    $decrement->decrement('wallet_points', round($prof_amt,2));

                    $user = User::where('id', $employee->user_id)->first();
                    $user->notify(new ResumeDownload($recruiter->name, $employee->first_name . ' ' . $employee->last_name));
                    if(Storage::disk('public')->exists('files/resumes/'.$resume)){
                        $filePath = Storage::disk('public')->path('files/resumes/'.$resume);
                        $headers = ['Content-Type: application/pdf'];
                        $fileName = time().'.pdf';
                        return response()->download($filePath, $fileName, $headers);
                    }else{
                        return redirect()->back()->with('error', "Candidate don't have resume uploaded");
                    }
                }else{
                    return redirect()->back()->with('warning', 'Low balance please recharge your account to download resume');
                }
            }else{
                return redirect()->back()->with('warning', 'Low balance please recharge your account to download resume');
            }
        }else{
            $resume = $employee->careers->resume;
            if($resume != null){
                if(Storage::disk('public')->exists('files/resumes/'.$resume)){
                    $filePath = Storage::disk('public')->path('files/resumes/'.$resume);
                    $headers = ['Content-Type: application/pdf'];
                    $fileName = time().'.pdf';
                    return response()->download($filePath, $fileName, $headers);
                }else{
                    return redirect()->back()->with('error', "Candidate don't have resume uploaded");
                }
            }else{
                return redirect()->back()->with('error', "Candidate don't have resume uploaded");
            }
        }
    }


}
