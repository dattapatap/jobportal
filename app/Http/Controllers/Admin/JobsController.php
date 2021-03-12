<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
                     ->paginate(5);
       return view('admin.jobs.index',  compact('jobs'));
   }

   public function viewJobs($id){
        $jobs = Jobs::where('id', $id)
        ->with('industry', 'jobrole', 'location', 'recruiter')
        ->first();
        return view('admin.jobs.show', compact('jobs'));
   }

}
