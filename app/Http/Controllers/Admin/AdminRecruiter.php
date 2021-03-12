<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRecruiter extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = DB::table('recruiters')
                   ->select('users.email', 'users.mobile', 'users.name', 'recruiters.id','recruiters.company_name', 'users.id as uid',
                   'recruiters.contact_person', 'recruiters.proffession', 'recruiters.location', 'recruiters.status AS r_status', 'users.status AS u_status')
                   ->join('users','users.id','=','recruiters.user_id')
                   ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function ($data) {
                        $status =  ($data->r_status     == 0)?'<span class="text-danger"> UnVerified </span>':'<span class="text-info"> Verified </span>';
                        return $status;
                    })
                    ->addColumn('action', function($data){
                        $buttons =  '<a href="recruiter/view/'.$data->id .'"class="edit btn btn-info btn-sm"><i class="fa fa-eye"></i></a>';
                        $checkedStatus = ($data->u_status == "Active") ? 'checked':'';
                        $buttons .= '<div class="bt-switch ml-2" data-toggle="tooltip" data-placement="bottom" title="User Status" ><input type="checkbox" '.$checkedStatus.' id="'.$data->uid.'" data-on-color="warning" data-off-color="danger" data-on-text="A" data-off-text="IA" class="user_status"></div>';
                        return $buttons;
                   })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
       }
       return view('admin.recruiter.index');
    }

    public function view($id){
        $user = Recruiter::where('id', $id)
        ->with('jobs')
        ->with('user')
        ->first();
        return view('admin.recruiter.view', compact('user'));
    }

    public function updateRecruiterStatus(Request $request){
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success'=>true,'message'=>'Status Changed Successfully']);
    }

    public function verifyRecruiter(Request $request){
        $recr = Recruiter::find($request->id);
        $recr->status = true;
        $recr->save();
        return response()->json(['success'=>true,'message'=>'Recruiter Verified Successfully']);
    }


}
