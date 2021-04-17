<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Employee\EmpJobSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpJobSavedController extends Controller
{

    public function save(Request $request , $id){
        if(Auth::user()){
             if(Auth::user()->role_id!=3){
                 return redirect()->route('login');
             } else{
                $employee =  Employee::where('id', auth()->user()->employee->id)
                ->with('careers')
                ->with('userskills')
                ->with('educations')
                ->with('experience')
                ->with('userskills')
                ->first();

                if(!$employee->careers || $employee->userskills->isEmpty() || $employee->educations->isEmpty()|| $employee->experience->isEmpty()){
                    $request->session()->flash('error',"Please update your profile before save");
                    return redirect()->back();
                }else{
                        $userid = Auth::user()->employee->id;
                        $jobid = $id;
                        $appJob = new EmpJobSaved();
                        $appJob->emp_id = $userid;
                        $appJob->job_id = $jobid;
                        $appJob->save();
                        $request->session()->flash('success',"Job Saved Successfully");
                        return redirect()->back();
                }
            }
        }else{
             return redirect()->route('login');
        }
    }


    public function delete(Request $request){
        $savedJob = EmpJobSaved::find($request->post('id'));
        $status = $savedJob->delete();
        if($status){
            return response()->json(['status'=>true, 'success' => 'Job Deleted']);
        }else{
            return response()->json(['status'=>false, 'error' => 'Job not deleted, Please try again']);
        }
    }

}
