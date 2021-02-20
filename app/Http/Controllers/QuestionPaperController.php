<?php

namespace App\Http\Controllers;

use App\Models\QPaperCategory;
use App\Models\QuestionCategory;
use App\Models\QuestionPaper;
use App\Models\QuestionPaperQuestions;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class QuestionPaperController extends Controller
{
    
    public function index(Request $request){
        if ($request->ajax()) {
            $data = QuestionPaper::where('deleted_at',null)
                   ->with('category')
                   ->orderBy('id','desc')
                   ->get();              
            
            // var_dump($data->all());

           return DataTables::of($data)
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                           $buttons =  '<a href="'.url("admin/qp/edit/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/qp/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                      return $data->created_at->format('Y-m-d h:m:s');
                   })
                   ->editColumn('category', function ($data) {
                      return $data->category->name;
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.assessment.qp.index');
    }

    public function create(){
        $category = QPaperCategory::where('deleted_at', null)->get();
        $questioncategory = QuestionCategory::where('deleted_at', null)->get();
        $questions = Questions::where('deleted_at', null)->with('category')->with('options')->get();
        return view('admin.assessment.qp.create', compact('questions', 'category','questioncategory'));

    }


    public function store(Request $request){
        $validator = $request->validate([
            'qp_category' => 'required|numeric|gt:0',
            'description' => 'required|string',
            'tot_questions' => 'required|numeric|min:5',
            'max_marks' => 'required|numeric|gt:0',
            'test_time' => 'required|date_format:H:i:s'
        ]);

        try{
            DB::beginTransaction();
            $qp  = new QuestionPaper();
            $qp->qp_cat  = $request->qp_category;
            $qp->description = $request->description;
            $qp->no_questions = count($request->questions);
            $qp->max_time = $request->test_time;
            $qp->max_marks = $request->max_marks;
            $qp->save();
            $qp_id = $qp->id;

            //Question Paper Questions
            $questions = $request->questions;
            for($ctr=0; $ctr < count($questions); $ctr++){
                $qp_ques  = new QuestionPaperQuestions();
                $qp_ques->qp_id   = $qp_id;
                $qp_ques->q_id  = $questions[$ctr];
                $qp_ques->save();
            }
            DB::commit();
            $request->session()->flash('success',"Question Paper created Successfully");   
            return redirect('/admin/qp');
        }catch(\Exception $ex){
            DB::rollBack();
            // echo $ex->getMessage();
            return redirect()->back()->withInput()->with(['error'=>'QuestionPaper not created, please try again']);
        }                 
    }

    public function edit($id){
            $category = QPaperCategory::where('deleted_at', null)->get();
            $questioncategory = QuestionCategory::where('deleted_at', null)->get();
            $questions = Questions::where('deleted_at', null)->with('category')->with('options')->get();

            $qp = QuestionPaper::where('deleted_at', null)->with('questions', function ($query) {
                $query->where('deleted_at',null);
            })->first(); 

            return view('admin.assessment.qp.edit', compact('category', 'questioncategory', 'questions', 'qp'));
    }

    public function update(Request $request){
        $validator = $request->validate([
            'qp_category' => 'required|numeric|gt:0',
            'description' => 'required|string',
            'tot_questions' => 'required|numeric|min:5',
            'max_marks' => 'required|numeric|gt:0',
            'test_time' => 'required|date_format:H:i:s'
        ]);

        try{
            DB::beginTransaction();
            $qp = QuestionPaper::where(['id'=>$request->post('qp_id')])->with('questions')->first();
            foreach($qp->questions  as $questions){
                QuestionPaperQuestions::find($questions->id)->delete();
            }

            $qp->qp_cat  = $request->post('qp_category');
            $qp->description = $request->post('description');
            $qp->no_questions = count($request->post('questions'));
            $qp->max_time = $request->post('test_time');
            $qp->max_marks = $request->post('max_marks');
            $qp->save();

            $questions = $request->post('questions');
            for($ctr=0; $ctr < count($questions); $ctr++){
                $qp_ques  = new QuestionPaperQuestions();
                $qp_ques->qp_id   = $qp->id;
                $qp_ques->q_id  = $questions[$ctr];
                $qp_ques->save();
            }
            
            DB::commit();
            $request->session()->flash('success',"Question Paper Updated Successfully");   
            return redirect('/admin/qp');
        }catch(\Exception $ex){
            DB::rollBack();
            return back()->with(['error'=>"Question paper not updated, Please try again"]);   
        }   
    }

    public function delete($id){
       $questions = QuestionPaper::find($id)->delete();
       return back()->with('success', 'Question Paper deleted successfully!');
    }


    
}
