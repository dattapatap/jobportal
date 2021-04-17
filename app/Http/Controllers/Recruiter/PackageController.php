<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{

   public function index(){
       $packages = Package::where('deleted_at', null)
                            ->where('status', 'Active')->get();
       return view('recruiter.packages', compact('packages'));
   }

}
