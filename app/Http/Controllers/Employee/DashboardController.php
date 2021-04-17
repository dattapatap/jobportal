<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $userid = auth()->user()->employee->id;

        $appliedjobs = Jobs::join('emp_job_applieds', 'emp_job_applieds.job_id', '=' , 'jobs.id')
                        ->where('emp_job_applieds.emp_id', '=' , $userid )->orderBy('emp_job_applieds.id', 'desc')->get();

        $savedjobs = Jobs::join('emp_job_saveds', 'emp_job_saveds.job_id', '=' , 'jobs.id')
                        ->where('emp_job_saveds.emp_id', '=' , $userid )->orderBy('emp_job_saveds.id', 'desc')->get();

        return view('employee.dashboard', compact('appliedjobs', 'savedjobs'));
    }
}
