<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->User()->load('recruiter');
        return view('recruiter.dashboard', compact('user'));
    }
}
