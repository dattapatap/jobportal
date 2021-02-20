<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user()->recruiter;
        $postedJobs = Jobs::where('rec_id',$user->rec_id)->orderBy('id','desc')->offset(0)->limit(5)->get();
        return view('recruiter.dashboard', compact('user','postedJobs'));
    }
}
