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
        $postedJobs = Jobs::where('rec_id',$user->id)->orderBy('id','desc')->limit(5)->get();

        $jbs = Jobs::where('rec_id', $user->id)->get();
        $totjobs = count($jbs);
        return view('recruiter.dashboard', compact('user','postedJobs', 'totjobs'));
    }
}
