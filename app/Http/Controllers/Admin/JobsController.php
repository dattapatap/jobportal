<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Jobs;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
   public function index(){
       $jobs = Jobs::where('deleted_at', null)
                     ->orderBy('created_at', 'desc')
                     ->with('recruiter')
                     ->with('applied')
                     ->paginate(10);
       return view('admin.jobs.index',  compact('jobs'));
   }

   public function viewJobs($id){
        $jobs = Jobs::where('id', $id)
        ->with('applied.employee')
        ->with('industry', 'jobrole', 'location', 'recruiter')
        ->first();

        if(!$jobs)
            abort(404);

         return view('admin.jobs.show', compact('jobs'));
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

}
