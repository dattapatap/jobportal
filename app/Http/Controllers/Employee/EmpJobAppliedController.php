<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employee\EmpJobApplied;
use App\Models\Employee\EmpJobSaved;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpJobAppliedController extends Controller
{

    public function index(){
        $userid = auth()->user()->employee->id;

        $appliedjobs = Jobs::join('emp_job_applieds', 'emp_job_applieds.job_id', '=' , 'jobs.id')
                        ->where('emp_job_applieds.emp_id', '=' , $userid )->orderBy('emp_job_applieds.id', 'desc')->get();

        $savedjobs = Jobs::join('emp_job_saveds', 'emp_job_saveds.job_id', '=' , 'jobs.id')
                        ->where('emp_job_saveds.emp_id', '=' , $userid )->orderBy('emp_job_saveds.id', 'desc')->get();

        return view('employee.dashboard', compact('appliedjobs', 'savedjobs'));
    }

    public function apply(Request $request , $id){
       if(Auth::user()){
            if(Auth::user()->role_id!=3){
                return redirect()->route('login');
            }else{
                $employee =  Employee::where('id', auth()->user()->employee->id)
                ->with('careers')
                ->with('userskills')
                ->with('educations')
                ->with('experience')
                ->with('userskills')
                ->with('test')
                ->first();

                // dd($employee);
                if(!$employee->careers || $employee->userskills->isEmpty() || $employee->educations->isEmpty()|| $employee->experience->isEmpty()){
                    $request->session()->flash('error',"Please update your profile before apply");
                    return redirect()->back();
                }else{
                    
                    $jobid = $id;
                    $appJob = new EmpJobApplied();
                    $appJob->emp_id = $employee->id;
                    $appJob->job_id = $jobid;
                    $status = $appJob->save();
                    if($status){
                            $savedJob = EmpJobSaved::where('job_id',$appJob->job_id)->first();
                            if($savedJob)
                                $savedJob->delete();
                    }
                    $request->session()->flash('success',"Applied Successfully");
                    return redirect()->back();
                }
            }
       }else{
            return redirect()->route('login');
       }
    }



}
