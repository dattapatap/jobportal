<?php

namespace App\Http\Controllers;

use App\Models\QPaperCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class QPaperCategoryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = QPaperCategory::where('deleted_at',null)
                   ->orderBy('id','desc')
                   ->get();
           return DataTables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/qpcategory/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/qpcategory/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('Y-m-d h:m:s');
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.assessment.qpcat.index');
    }


    public function manageqpcategory(Request $request, $id='')
    {   
        if($id > 0){
            $arr = QPaperCategory::where(['id' => $id])->firstOrFail();
            $result['qc_name'] =$arr->name;
            $result['id'] =$arr->id;
        }else{

            $result['qc_name'] = '';
            $result['id'] = '';
        }
        return view('admin.assessment.qpcat.edit', $result);
    }


    public function store(Request $request)
    {
        if($request->post('id') < 0){
            $rules = array(
                'name'=>"required|string|max:255|unique:q_paper_categories,name,NULL,id,deleted_at,NULL",
            );
        }else{
            $rules = array(
                'name'=>"required|string|max:255|unique:q_paper_categories,name,".$request->post('id').",id,deleted_at,NULL",
            );
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            if($request->post('id')>0){
                $qc= QPaperCategory::find($request->post('id'));
                $msg = "Categery Updated Successfully";
            }else{
                $qc = new QPaperCategory();
                $msg = "Categery Saved Successfully";
            }
            $qc->name = $request->name;
            $qc->save();
            $request->session()->flash('success',$msg);   
            return redirect('/admin/qpcategory'); 
        }
    }

    public function delete(QPaperCategory $QPaperCategory)
    {
       $QPaperCategory->delete();
       return back()->with(['success'=>"Categery Deleted Successfully"]);   
    }
}
