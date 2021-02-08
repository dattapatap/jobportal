<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use App\Models\Questions;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Questions::where('deleted_at',null)
                   ->with('category')
                   ->orderBy('questions.id','desc')
                   ->get();
                  
           return Datatables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/questions/manage/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/questions/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                    return $data->created_at->format('Y-m-d h:m:s');
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.assessment.questions.index');
    }


    public function manageQuestions(Request $request, $id='')
    {   

        $category = QuestionCategory::where('deleted_at', null)->get();

        if($id > 0){
            $arr = Questions::where(['id' => $id])->get();
            $result['qc_name'] =$arr['0']->name;
            $result['id'] =$arr['0']->id;
        }else{

            $result['qc_name'] = '';
            $result['id'] = '';
        }
        return view('admin.assessment.questions.edit', compact('result', 'category'));
    }


    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required|string|max:255|unique:question_categories,name,'. $request->post('id'),
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{

            if($request->post('id')>0){
                $qc= Questions::find($request->post('id'));
                $msg = "Categery Updated Successfully";
            }else{
                $qc = new Questions;
                $msg = "Categery Saved Successfully";
            }
            $qc->name = $request->name;
            $qc->save();
            return back()->with(['success'=> $msg]);            
        }
    }

    public function delete(Questions $Questions)
    {
       $Questions->delete();
       return back()->with(['success'=>"Categery Deleted Successfully"]);   
    }









}
