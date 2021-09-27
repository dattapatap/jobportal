<?php

namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use App\Models\EmployerPackage;

use Illuminate\Http\Request;

class EmployerPackageController extends Controller
{
    
	public function index(Request $request)
    {
    	$user = auth()->User();
    	$pack = EmployerPackage::where('deleted_at', null)
    			->where('rec_id', $user->recruiter->id )
    			->orderBy('id','desc')
    			->with('package')
    			->paginate(10);
        return view('recruiter.plans', compact('pack'));
    }

    public function transactions(){
        $user = auth()->User();
        $pack = EmployerPackage::where('deleted_at', null)
                ->where('rec_id', $user->recruiter->id )
                ->orderBy('id','desc')
                ->with('package')
                ->paginate(10);
        return view('recruiter.transactions', compact('pack'));
    }

}
