<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->User()->recruiter;       
        $postedJobs = Jobs::where('rec_id',$user->rec_id);

        return view('recruiter.dashboard', compact('user','postedJobs'));
    }
}
