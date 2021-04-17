<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Admin\TestSlots;
use App\Models\Employee;
use App\Models\Employee\EmpTest;
use App\Models\Employee\EmpTestQuestions;
use App\Models\Questions;
use App\Notifications\TestCompleted;
use App\Notifications\TestScheduled;
use App\Rules\registerDate;
use App\Rules\TestSlotTimeValidation;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Question\Question;

class Assessment extends Controller
{
    public function index(){
        $testSlots = TestSlots::where('deleted_at',null)->where('status', "Active")->get();
        $testGiven = EmpTest::where('emp_id', auth()->user()->employee->id)
                        ->with('slots')
                        ->with('testquestions.answeres')
                        ->orderBy('id', 'desc')
                        ->offset(0)->limit(3)->get();

        return view('employee.assessment.testresult', compact('testGiven', 'testSlots'));
    }

    public function scheduleTest(Request $request){
        $objEmp = auth()->user()->employee;
        $emp_id = $objEmp->id;
        $emp_redisterd_date = $objEmp->registerd_date;
        $slot = TestSlots::find($request->testslot);

        $request->validate([
            'testdate' => ['required','date','after_or_equal:'. $emp_redisterd_date .'', new registerDate($emp_redisterd_date),  'after_or_equal:'.now()],
            'testslot' => ['required', 'numeric', new TestSlotTimeValidation($request, $slot)],
        ]);

        $emp = $this->getEmplyeeDetails();
        if(!$emp->careers || $emp->userskills->isEmpty() ||empty($emp->educations)||empty($emp->experience) ){
            $request->session()->flash('error',"Please update your profile before test");
            return redirect('/employee/assessment');
        }else{
            try{
                    DB::beginTransaction();
                    $questions = $this->getAllQuestionsBySkill($emp);
                    if(count($questions) < 20 ){
                        $request->session()->flash('error',"Short of Questions, Please contact to admin");
                        return redirect('/employee/assessment');
                    }
                    $objQTest = $this->createQuestionTest($questions, $emp, $request);
                    db::commit();

                    Notification::send(auth()->user(), new TestScheduled($objQTest, $slot));
                    $request->session()->flash('success',"Test Scheduled Successfully");
                    return redirect('/employee/assessment');
            }catch(Exception $ex){
                echo  $ex->getMessage();
            }
        }
    }

    //Create New Test By Employee
    public function testStartPage(Request $request){
        $test = EmpTest::where('emp_id', auth()->user()->employee->id)
                    ->orderBy('id', 'desc')
                    ->first();
            if(!$test){
                $this->assignTest();
                return view('employee.assessment.testwelcome');
            }
            if($test->status=="started"){
                return view('employee.assessment.testwelcome');
            }

            if($test->status=="Completed"){
                $test = EmpTest::where('emp_id', auth()->user()->employee->id)
                                ->orderBy('id', 'desc')
                                ->get();

                $totTestTaken = count($test);
                if($totTestTaken >= 3){
                    $request->session()->flash('error', "Your Test Limit Exceeded");
                    return redirect('/employee/assessment/testresult');
                }
                $this->assignTest();
                return view('employee.assessment.testwelcome');

            }
    }



    public function getEmplyeeDetails(){
        $employee =  Employee::where('id', auth()->user()->employee->id)
        ->with('careers')
        ->with('userskills')
        ->with('educations')
        ->with('experience')
        ->with('userskills')
        ->first();
        return $employee;
    }
    public function getAllQuestionsBySkill($employee){
        $expYear = $employee->careers->experience_year.'.'.$employee->careers->experience_month;
        $arrySkills = $employee->userskills;
        $skillsArray = array();
        foreach ($arrySkills as $skills) {
           array_push($skillsArray, $skills->skill_id);
        }
        if($expYear < 0.6){
            $expCat = 1;
            $questions = $this->getAllQuestions($expCat, $skillsArray);
        }else if($expYear > 0.6 && $expYear < 2.0){
            $expCat = 2;
            $questions = $this->getAllQuestions($expCat, $skillsArray);
        }else{
            $expCat = 3;
            $questions = $this->getAllQuestions($expCat, $skillsArray);
        }
        return $questions;
    }
    public function getAllQuestions($expCategory, $arraSkills){
        $questions = DB::table('questions')
                         ->where('q_type',$expCategory)
                         ->whereIn('qc_id',$arraSkills )
                         ->inRandomOrder()
                         ->take(20)     //Max Questions for One Test 20 Questions
                         ->get();

        return $questions;
    }
    public function createQuestionTest($questions, $emp, $request){
            $test  = new EmpTest;
            $test->emp_id = $emp->id;
            $test->last_q_no = 1;
            $test->tot_ques = count($questions);
            $test->max_time = '15.00';  //Max Time for Test 15 Min
            $test->status = 'Scheduled';
            $test->test_sheduled = $request->testdate;
            $test->slot_id = $request->testslot;
            $test->rem_time = '15.00';
            $test->save();
            $ctr = 1;
            foreach($questions as $quest){
                $testQues = new EmpTestQuestions();
                $testQues->sl_no = $ctr;
                $testQues->test_id = $test->id;
                $testQues->q_id = $quest->id;
                $testQues->test_id = $test->id;
                $testQues->save();
                $ctr++;
            }
        return $test;
    }


    //Start Test
    public function startTest(){
        $employee = auth()->user()->employee;
        $existingTest = DB::table('emp_tests')->where('emp_id', $employee->id )
                        ->where('test_taken', null)
                        ->where('status', 'started')
                        ->orderBy('id', 'desc')
                        ->first();

        if($existingTest){
            if($existingTest->rem_time < 0){
                $this->updateTestAsCompleted($existingTest);
                Notification::send(auth()->user(), new TestCompleted($existingTest));
                return redirect('/employee/assessment/testTaken');
            }
            $this->setTestSession($existingTest, $employee);
            $questId = $this->returnQuestionId($existingTest->id, $existingTest->last_q_no);
            $objQuest = $this->getFirstQuestion($questId);
            return view('employee.assessment.testpage', compact('objQuest'));
        }
    }
    public function setTestSession($test, $employee){
        session()->put('qptest_id', $test->id);
        session()->put('emp_id', $employee->id);
        session()->put('maxQuestions', $test->tot_ques) ;
        session()->put('currQNo', $test->last_q_no);
        session()->put('maxTime', $test->max_time);
        session()->put('elapsed_time', ($test->rem_time * 60) );
        session()->put('rem_time', ($test->rem_time*60 ));
        session()->put('last_updateTime', Carbon::now());

    }
    public function returnQuestionId($testId, $slNo){
      return  DB::table('emp_test_questions')->where('sl_no', $slNo)->orWhere('id', $testId)->first()->q_id;
    }
    public function getFirstQuestion($questionId){
        $questions = Questions::where('id',$questionId )
                     ->with('options')
                     ->first();
        return $questions;
    }
    public function updateTestAsCompleted($existingTest){
        $result = DB::table('emp_tests')
                ->where('id', $existingTest->id)
                ->update(['status'=>'Completed', 'test_taken'=>Carbon::now()]);
    }





    //Update Test Status
    public function updateTestStatus(Request $request){
        $status = $request->post('status');
        try{
            $test = EmpTest::where('emp_id', auth()->user()->employee->id)
                        ->orderBy('id', 'desc')
                       ->first();

                $test->status = $status;
                $test->save();
                return response()->json(['status'=>true], 202);
        }catch(Exception $ex){
            return response()->json(['status'=>false], 202);
        }


    }


}
