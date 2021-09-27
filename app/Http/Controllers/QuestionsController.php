<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use App\Models\QuestionOptions;
use App\Models\Questions;
use App\Models\Skills;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \Illuminate\Support\Facades\DB;
use App\Imports\QuestionsImport;
use Excel;


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
                           $buttons =  '<div style="white-space: nowrap;"><a href="'.url("admin/questions/edit/". $data->id ."") .'"class="edit btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp<a href="'.url("admin/questions/delete/". $data->id ."") .'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
                           return $buttons;
                   })
                   ->editColumn('created_at', function ($data) {
                      return $data->created_at->format('Y-m-d h:m:s');
                   })
                   ->editColumn('category', function ($data) {
                      return $data->category->description;
                   })
                   ->editColumn('name', function ($data) {
                        return html_entity_decode($data->name);
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


    public function create(){
         $category = Skills::where('deleted_at', null)->get();
         $type = DB::table('question_types')->get();
         return view('admin.assessment.questions.create', compact('category', 'type'));
    }

    public function upload(){
         $category = Skills::where('deleted_at', null)->get();
         $type = DB::table('question_types')->get();
         return view('admin.assessment.questions.upload', compact('category', 'type'));      
    }
    public function excelUpload(Request $request){

       $this->validate($request, [
        'file_question'  => 'required|mimes:xls,xlsx,csv',
        'question_type'  => 'required|numeric',
        'question_category'  => 'required|numeric',
       ]);

       $path = $request->file('file_question')->getRealPath();
       $qimport = new QuestionsImport;
       Excel::import($qimport, $path);
       
       if( count($qimport->data) > 0){
          $questionsArray  = $qimport->data;

          DB::beginTransaction();

          try{
              for( $ctr=0; $ctr < count($questionsArray); $ctr++){

                  $qtype = $request->post('question_type');
                  $qcategory = $request->post('question_category');
                  $questionTExt = $questionsArray[$ctr]['question'];

                  $totarr = (count($questionsArray[$ctr]) -2) / 2;

                  $optArray = array();
                  for($j=0; $j < $totarr; $j++){
                      if(isset($questionsArray[$ctr]['option'.($j+1)])){
                          array_push($optArray, [ 'option' => $questionsArray[$ctr]['option'.($j+1)], 
                                             'marks'=> $questionsArray[$ctr]['marks'.($j+1)]
                                           ]);
                        }
                  }

                  $question  = new Questions;
                  $question->qc_id = $qcategory;
                  $question->q_type = $qtype;
                  $question->name = $questionTExt;
                  $question->tot_options = count($optArray);
                  $question->save();
                  $q_id = $question->id;
                  
                  for($k=0; $k < count($optArray); $k++){
                    $ques_ops  = new QuestionOptions();
                    $ques_ops->q_id  = $q_id;
                    $ques_ops->options  = $optArray[$k]['option'];
                    $ques_ops->marks  = $optArray[$k]['marks'];
                    $ques_ops->save();
                  }
              
              }
              DB::commit();
              $request->session()->flash('success',"Questions uploaded Successfully");
              return redirect()->back();
          }catch(Exception $ex){
            DB::rollBack();
            // echo $ex->getMessage();
            return back()->with('error', "Invalid data found in file");
          }

        }else{
            return back()->with('error', 'Empty file.');
        }
    }


    public function store(Request $request){

        $q_id = $request->post('q_id');
        $q_category = $request->post('cat');
        $q_type = $request->post('quest');
        $question_text = $request->post('question');
        $options = json_decode($request->post('option'), true);
        $marks = json_decode($request->post('ans') , true);

        try{
            DB::beginTransaction();
            $question  = new Questions;
            $question->qc_id = $q_category;
            $question->q_type = $q_type;
            $question->name = $question_text;
            $question->tot_options = count($marks);
            $question->save();
            $q_id = $question->id;
            for($ctr=0; $ctr < count($options); $ctr++){
                $ques_ops  = new QuestionOptions();
                $ques_ops->q_id  = $q_id;
                $ques_ops->options  = $options[$ctr];
                $ques_ops->marks  = $marks[$ctr];
                $ques_ops->save();
            }
            DB::commit();
            $request->session()->flash('success',"Question added Successfully");
            return response()->json(['code'=>200, 'message'=>'Question Added Successfully','data' => $question], 200);
        }catch(Exception $ex){
            DB::rollBack();
            echo $ex->getMessage();
            echo $ex->getLine();
            return response()->json(['code'=>202, 'message'=>'Question not added, please try again','data' => $question], 200);
        }
    }

    public function edit($id){
            $category = Skills::where('deleted_at', null)->get();
            $type = DB::table('question_types')->get();
            $ques = Questions::where(['id' => $id])->with('options')->firstOrFail();
            return view('admin.assessment.questions.edit', compact('category', 'type', 'ques'));
    }

    public function update(Request $request){
        $q_id = $request->post('q_id');
        $q_category = $request->post('cat');
        $q_type = $request->post('quest');
        $question_text = $request->post('question');
        $options = json_decode($request->post('option'), true);
        $marks = json_decode($request->post('ans') , true);
        $newOPtions = json_decode($request->post('opts') , true);

        try{
            DB::beginTransaction();
            $question = Questions::where(['id'=>$request->post('q_id')])->first();

            $question->qc_id = $q_category;
            $question->q_type = $q_type;
            $question->name = $question_text;
            $question->tot_options = count($options);
            $question->save();

            $array_questions = $newOPtions;
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
            $request->session()->flash('success',"Question updated successfully");
            return response()->json(['code'=>200, 'message'=>'Question updated successfully','data' => $question], 200);
        }catch(Exception $ex){
            DB::rollBack();
            echo $ex->getMessage();
            echo $ex->getLine();
            return response()->json(['code'=>202, 'message'=>'Question not added, please try again','data' => $question], 200);
        }
    }

    public function delete($id){
       $questions = Questions::find($id)->delete();
       return back()->with('success', 'Question deleted successfully!');
    }




}
