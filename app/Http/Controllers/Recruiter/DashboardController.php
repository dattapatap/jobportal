<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\EmployerPackage;
use App\Models\Employee\Interest;
use App\Models\EmployerPoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user()->recruiter;
        $postedJobs = Jobs::where('rec_id',$user->id)
                            ->orderBy('id','desc')
                            ->limit(5)->get();

        $jbs = Jobs::where('rec_id', $user->id)
                    ->get();

        $totjobs = count($jbs);

        $points = EmployerPoints::where('rec_id', $user->id)
        	                      ->value('wallet_points');

        $packages = EmployerPackage::where('rec_id', $user->id)->where('package_status', 'Active')
        	                       ->with('package')
        	                       ->orderBy('id', 'DESC')->first();


        $candidate = Interest::where('rec_id', $user->id)
                              ->orderBy('id', 'ASC')->get();


        $totItrest = count($candidate);

        return view('recruiter.dashboard', compact('user','postedJobs', 'totjobs','points', 'packages','totItrest'));
    }
}
