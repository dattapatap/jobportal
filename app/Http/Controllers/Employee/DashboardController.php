<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Employee\EmpTest;

class DashboardController extends Controller
{
    public function index(){
        $userid = auth()->user()->employee->id;

        $appliedjobs = Jobs::join('emp_job_applieds', 'emp_job_applieds.job_id', '=' , 'jobs.id')
                        ->where('emp_job_applieds.emp_id', '=' , $userid )->orderBy('emp_job_applieds.id', 'desc')->get();

        $savedjobs = Jobs::join('emp_job_saveds', 'emp_job_saveds.job_id', '=' , 'jobs.id')
                        ->where('emp_job_saveds.emp_id', '=' , $userid )->orderBy('emp_job_saveds.id', 'desc')->get();

        return view('employee.dashboard', compact('appliedjobs', 'savedjobs'));
    }

    public function checkTestGivenOrNot(){
    	 $emp =  Employee::where('id', auth()->user()->employee->id)
				        ->with('careers')
				        ->with('userskills')
				        ->with('educations')
				        ->with('experience')
				        ->with('empAudits')
				        ->with('empOrgnisations')
				        ->first();

		 if($emp->careers && $emp->userskills && $emp->educations && $emp->experience && $emp->empAudits && 
		 	$emp->empOrgnisations ){
				$testGiven = EmpTest::where('emp_id', auth()->user()->employee->id)->get();
				if(count($testGiven) == 0){
					return response()->json(['status'=>true]);
				}else{
					return response()->json(['status'=>false]);
				}
		 }else{
		 	return response()->json(['status'=>false]);
		 }
    }
}
