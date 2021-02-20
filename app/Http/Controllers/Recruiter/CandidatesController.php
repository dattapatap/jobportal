<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\JobPositions;
use App\Models\Recruiter;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CandidatesController extends Controller
{

   public function index(){
       $positions = JobPositions::where('deleted_at', null)->get();
       $skills = Skills::where('deleted_at', null)->get();
       return view('recruiter.candidates', compact('positions', 'skills'));
   }

}
