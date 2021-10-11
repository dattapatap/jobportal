<?php

namespace App\Http\Controllers\Recruiter;
use App\Http\Controllers\Controller;
use App\Models\EmployerPackage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function viewinvoice(Request $request, $id){
        $selPackage = EmployerPackage::where('deleted_at', null)
                                        ->with('package')
                                        ->with('emp')
                                        ->with('payment')
                                        ->get()->firstOrFail();

        $billAddress = DB::table('users')->join('users_admin','users_admin.user_id','=','users.id')->where(['users.id'=>1])->get()->first();

        return view('recruiter.invoice', compact('selPackage', 'billAddress') );
    }


}
