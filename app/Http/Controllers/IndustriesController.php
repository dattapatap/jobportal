<?php

namespace App\Http\Controllers;

use App\Models\Industries;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class IndustriesController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Industries::where('deleted_at',null)
                   ->orderBy('id','desc')
                   ->get();
           return DataTables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/industries/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/industries/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('Y-m-d h:m:s');
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.others.industry.index');
    }


    public function manageIndustries (Request $request, $id='')
    {
        if($id > 0){
            $arr = Industries::where(['id' => $id])->get();
            $result['qc_name'] =$arr['0']->name;
            $result['id'] =$arr['0']->id;
        }else{

            $result['qc_name'] = '';
            $result['id'] = '';
        }
        return view('admin.others.industry.edit', $result);
    }


    public function store(Request $request)
    {

        if($request->post('id') < 0){
            $rules = array(
                'name'=>"required|string|max:255|unique:industries,name,NULL,id,deleted_at,NULL",
            );
        }else{
            $rules = array(
                'name'=>"required|string|max:255|unique:industries,name,".$request->post('id').",id,deleted_at,NULL",
            );
        }
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            if($request->post('id')>0){
                $qc= Industries::find($request->post('id'));
                $msg = "Industry Updated Successfully";
            }else{
                $qc = new Industries;
                $msg = "Industry Saved Successfully";
            }
            $qc->name = $request->name;
            $qc->save();
            $request->session()->flash('success',$msg);
            return redirect('/admin/industries');
        }
    }

    public function delete(Industries $industries)
    {
       $industries->delete();
       return back()->with(['success'=>"Industry Deleted Successfully"]);
    }
}
