<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class QuestionCategoryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = QuestionCategory::where('deleted_at',null)
                   ->orderBy('question_categories.id','desc')
                   ->get();
           return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/questionCategory/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/questionCategory/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('Y-m-d h:m:s');
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.assessment.questionCat.index');
    }


    public function manageCategory(Request $request, $id='')
    {   
        if($id > 0){
            $arr = QuestionCategory::where(['id' => $id])->firstOrFail();
            $result['qc_name'] =$arr->name;
            $result['id'] =$arr->id;
        }else{

            $result['qc_name'] = '';
            $result['id'] = '';
        }
        return view('admin.assessment.questionCat.edit', $result);
    }


    public function store(Request $request)
    {
        if($request->post('id') < 0){
            $rules = array(
                'name'=>"required|string|max:255|unique:question_categories,name,NULL,id,deleted_at,NULL",
            );
        }else{
            $rules = array(
                'name'=>"required|string|max:255|unique:question_categories,name,".$request->post('id').",id,deleted_at,NULL",
            );
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            if($request->post('id')>0){
                $qc= QuestionCategory::find($request->post('id'));
                $msg = "Categery Updated Successfully";
            }else{
                $qc = new QuestionCategory;
                $msg = "Categery Saved Successfully";
            }
            $qc->name = $request->name;
            $qc->save();  
            $request->session()->flash('success',$msg);   
            return redirect('/admin/questionCategory');         
        }
    }

    public function delete(QuestionCategory $questionCategory)
    {
       $questionCategory->delete();
       return back()->with(['success'=>"Categery Deleted Successfully"]);   
    }
}
