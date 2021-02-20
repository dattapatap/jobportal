<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Industries;
use App\Models\JobPositions;
use App\Models\Jobs;
use App\Models\Recruiter;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
   public function index(){
       $user = auth()->User();
       $jobs = Jobs::where('rec_id', Auth::user()->recruiter->id)
                        ->with('industry', 'jobrole', 'location', 'recruiter')
                        ->where('deleted_at', null)
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);
       return view('recruiter.postjobs',  compact('jobs'));
   }

   public function viewjobs(Jobs $jobs){
       $jobs = Jobs::where('id', $jobs->id)->with('industry', 'jobrole', 'location', 'recruiter')->first();
       return view('recruiter.viewjobs', compact('jobs'));
   }

   public function viewnewjobform(){
        $industry = Industries::where('deleted_at',null)->get();
        $positions = JobPositions::where('deleted_at',null)->get();
        $city = City::where('deleted_at',null)->get();

        return view('recruiter.managejob', compact('industry','positions', 'city'));
   }
   public function create(Request $request){
            $request->validate([
                'job_title' => 'required|string|max:255',
                'job_role' => 'required|string|max:255',
                'job_industry' => 'required|string|max:255',
                'job_type' => 'required|string',
                'min_salary' => 'required|numeric|min:5000|max:99000',
                'max_salary' => 'required|numeric|gt:min_salary|min:5000|max:90000',
                'min_exp' => 'required|numeric|min:0|',
                'max_exp' => 'required|numeric|min:1|gt:min_exp',
                'job_location' => 'required|string',
                'job_eligibility' => 'required|string',
                'job_tot_positions' => 'required|numeric|min:0|max:50|not_in:0',
                'job_desc' => 'required|string'
            ]);
            try{
                $jobs = new Jobs;
                $jobs->job_title = $request->job_title;
                $jobs->job_role = $request->job_role;
                $jobs->job_industry = $request->job_industry;
                $jobs->job_type = $request->job_type;
                $jobs->min_salary = $request->min_salary;
                $jobs->max_salary = $request->max_salary;
                $jobs->min_exp = $request->min_exp;
                $jobs->max_exp = $request->max_exp;
                $jobs->job_location = $request->job_location;
                $jobs->job_eligibility = $request->job_eligibility;
                $jobs->job_tot_positions = $request->job_tot_positions;
                $jobs->job_desc = $request->job_desc;
                $jobs->status = true;
                $jobs->rec_id = Auth::user()->recruiter->id;
                $jobs->save();
                $request->session()->flash('success', 'Job Posted Successfully!');
                return redirect('/recruiter/postedjobs');
            }catch(Exception $ex){
                return back()->with('error', 'Job not posted, please try again!')->withInput();
            }

   }

   public function changeStatus(Jobs $jobs){
        $jobs = Jobs::findOrFail($jobs->id);
        if($jobs->status==1){
            $jobs->status=false;
            $jobs->save();
        }else{
            $jobs->status=true;
            $jobs->save();
        }
        return redirect()->back()->with('success', "Job status changed");
   }

   public function delete(Jobs $jobs){
        $jobs = Jobs::findOrFail($jobs->id);
        $jobs->delete();
        return redirect()->back()->with('success', "Job deleted successfully");

   }


}
