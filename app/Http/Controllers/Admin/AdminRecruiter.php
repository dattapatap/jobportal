<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRecruiter extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = DB::table('recruiter')
                   ->select('users.email', 'users.mobile', 'users.name', 'recruiters.id','recruiters.company_name',
                   'recruiters.contact_person', 'recruiters.proffession', 'recruiters.location', 'recruiters.status')
                   ->join('users','users.id','=','recruiters.user_id')
                   ->get();

           return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                       return $btn;
                  })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.recruiter');
    }
}
