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
                    ->select('users.email', 'users.mobile','employee.id', 'users.id AS u_id', 'employee.first_name','employee.last_name', 'employee.dob', 
                    'employee.address', 'employee.gender', 'users.status', 'users.created_at', 'employee.status AS emp_status')
                    ->join('users','users.id','=','employee.user_id')
                    ->orderBy('employee.id','desc')
                    ->get();
                    
            return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('action', function($data){
                            $buttons =  '<a href="employee/view/'.$data->id .'"class="edit btn btn-info btn-sm"><i class="fa fa-eye"></i></a>';
                            $checkedStatus = ($data->status == "Active") ? 'checked':'';
                            $buttons .= '<div class="bt-switch ml-2" data-toggle="tooltip" data-placement="bottom" title="User Status" ><input type="checkbox" '.$checkedStatus.' id="'.$data->u_id.'" data-on-color="warning" data-off-color="danger" data-on-text="A" data-off-text="IA" class="user_status"></div>';
                            return $buttons;
                    })
                   ->addColumn('status', function ($data) {
                        return ($data->emp_status=='0')?'<span class="text-danger"> UnPlaced </span>':'<span class="text-warning"> Registered </span>';
                    })
                   ->rawColumns(['action','status'])
                   ->make(true);
        }
        return view('admin.employee.index');
    }
}
