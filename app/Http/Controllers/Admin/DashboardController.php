<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Jobs;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $postedJobs = Jobs::where('status',true)->with('recruiter')->with('applied')->orderBy('id','desc')->limit(5)->get();

        $jbs = Jobs::where('deleted_at', null)->get();
        $emp = Employee::where('deleted_at', null)->get();
        $rec = Recruiter::where('deleted_at', null)->get();
        $totjobs = count($jbs);
        $totEmp = count($emp);
        $totRec = count($rec);

        // dd($postedJobs);

        return view('admin.dashboard', compact('postedJobs', 'totjobs','totEmp', 'totRec'));
    }


}
