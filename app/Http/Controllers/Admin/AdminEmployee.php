<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminEmployee extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
             $data = DB::table('employee')
                    ->select('users.email', 'users.mobile','employee.id','employee.first_name','employee.last_name', 'employee.dob', 
                    'employee.address', 'employee.gender', 'employee.status')
                    ->join('users','users.id','=','employee.user_id')
                    // ->where(['employee.status' => 'false'])
                    ->get();
            return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="javascript:void(0)" class="edit btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>' ;
                        return $btn;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
        }
        return view('admin.employee');
    }
}
