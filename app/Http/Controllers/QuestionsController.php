<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use App\Models\QuestionOptions;
use App\Models\Questions;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \Illuminate\Support\Facades\DB;


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
                           $buttons =  '<a href="'.url("admin/questions/edit/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/questions/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                      return $data->created_at->format('Y-m-d h:m:s');
                   })
                   ->editColumn('category', function ($data) {
                      return $data->category->name;
                   })
                   ->editColumn('q_type', function ($data) {
                    $types = DB::table('question_types')->where('id' , $data->q_type)->first();
                    return $types->description;
                   })
                  ->rawColumns(['action'])
                  ->make(true);
       }
       return view('admin.assessment.questions.index');
    }


    public function create()
    {  
         $category = QuestionCategory::where('deleted_at', null)->get();
         $type = DB::table('question_types')->get();
        return view('admin.assessment.questions.create', compact('category', 'type'));
    }


    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $question  = new Questions();
            $question->qc_id = $request->question_category;
            $question->q_type = $request->question_type;
            $question->name = $request->question;
            $question->tot_options = count($request->opt);

            $question->save();
            $q_id = $question->id;

            $options = $request->opt;
            $marks = $request->marks;
            for($ctr=0; $ctr < count($options); $ctr++){
                $ques_ops  = new QuestionOptions();
                $ques_ops->q_id  = $q_id;
                $ques_ops->options  = $options[$ctr];
                $ques_ops->marks  = $marks[$ctr];
                $ques_ops->save();
            }
            DB::commit();
            $request->session()->flash('success',"Question Added Successfully");   
            return redirect('/admin/questions');  
          
        }catch(Exception $ex){
            DB::rollBack();
            echo $ex->getMessage();
            return back()->with(['error'=>"Question not saved, Please try again"]);   
        }                 
    }

    public function edit($id){
            $category = QuestionCategory::where('deleted_at', null)->get();            
            $type = DB::table('question_types')->get();            
            $ques = Questions::where(['id' => $id])->with('options')->firstOrFail();
            return view('admin.assessment.questions.edit', compact('category', 'type', 'ques'));
    }

    public function update(Request $request){
        try{
            DB::beginTransaction();
            $question = Questions::where(['id'=>$request->post('question_id')])->first();
            $question->qc_id = $request->post('question_category');
            $question->q_type = $request->post('question_type');
            $question->name = $request->post('question');
            $question->tot_options = count($request->post('opt'));
            $question->save();
            $options = $request->post('opt');
            $marks = $request->post('marks');
            $array_questions = $request->post('optionsId');
            for($ctr=0; $ctr < count($options); $ctr++){
                if($array_questions[$ctr] > 0){
                    $ques_ops  = QuestionOptions::find($array_questions[$ctr]);
                    $ques_ops->options  = $options[$ctr];
                    $ques_ops->marks  = $marks[$ctr];
                    $ques_ops->save();
                }else{
                    $ques_ops  = new QuestionOptions();
                    $ques_ops->options  = $options[$ctr];
                    $ques_ops->q_id  = $question->id;
                    $ques_ops->marks  = $marks[$ctr];
                    $ques_ops->save();
                }
            }
            DB::commit();
            $request->session()->flash('success',"Question Updated Successfully");   
            return redirect('/admin/questions');
        }catch(Exception $ex){
            DB::rollBack();
            return back()->with(['error'=>"Question not updated, Please try again"]);   
        }   
    }

    public function delete($id){
       $questions = Questions::find($id)->delete();
       return back()->with('success', 'Question deleted successfully!');
    }




}
