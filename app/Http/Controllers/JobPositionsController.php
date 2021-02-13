<?php

namespace App\Http\Controllers;

use App\Models\JobPositions;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class JobPositionsController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = JobPositions::where('deleted_at',null)
                   ->orderBy('id','desc')
                   ->get();
                  
           return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/jobpositions/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/jobpositions/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                      return $data->created_at->format('Y-m-d h:m:s');
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.others.carr_positions.index');
    }

    public function manageJobPosition (Request $request, $id='')
    {
        if($id > 0){
            $arr = JobPositions::where(['id' => $id])->firstOrFail();
            $result['name'] = $arr->name;
            $result['id'] =$arr->id;
        }else{
            $result['name'] = '';
            $result['id'] = '';
        }
        return view('admin.others.carr_positions.edit', compact('result'));
    }

    public function store(Request $request)
    {

        if($request->post('id') < 0){
            $rules = array(
                'position_name'=>"required|string|max:255|unique:job_positions,name,NULL,id,deleted_at,NULL",
            );
        }else{
            $rules = array(
                'position_name'=>"required|string|max:255|unique:job_positions,name,".$request->post('id').",id,deleted_at,NULL",
            );
        }
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();;
        }else{
            if($request->post('id') > 0){
                $job= JobPositions::find($request->post('id'));
                $msg = "Position Updated Successfully";
            }else{
                $job = new JobPositions;
                $msg = "Position Saved Successfully";
            }
            $job->name = $request->position_name;
            $job->save();  
            $request->session()->flash('success',$msg);   
            return redirect('/admin/jobpositions');         
        }
    }
    public function delete($id){
       JobPositions::find($id)->delete();
       return back()->with('success', 'Position deleted successfully!');
    }

}
