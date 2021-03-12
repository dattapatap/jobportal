<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $postedJobs = Jobs::where('status',true)->with('recruiter')->orderBy('id','desc')->limit(5)->get();

        $jbs = Jobs::where('deleted_at', null)->get();
        $totjobs = count($jbs);
        return view('admin.dashboard', compact('postedJobs', 'totjobs'));
    }


}
