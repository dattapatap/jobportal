<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\Jobs;

class EmployeeViewRecruiterController extends Controller
{
    //
    public function view($id){
        $user = Recruiter::where('id', $id)
        ->with('jobs')
        ->with('user')
        ->first();

        $jobs = Jobs::where('rec_id', $id)
                        ->with('industry', 'jobrole', 'location', 'recruiter')
                        ->where('deleted_at', null)
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);



        return view('employee.profile.recruiter_profile', compact('user','jobs'));
    }

    public function viewjobs(Jobs $jobs){
        $jobs = Jobs::where('id', $jobs->id)->with('industry', 'jobrole', 'location', 'recruiter')->first();
        return view('employee.profile.viewjobs', compact('jobs'));
    }
}
