<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\Employee\EmpTest;
use App\Models\Questions;
use App\Notifications\TestCompleted;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class TestFactoryController extends Controller
{
    public function getNextQuestions(Request $request){
        $TestPaperId = session()->get('qptest_id');
        $QNO =  $request->post('QNO');
        $selectedOptions = $request->post('options');
        $remainingTime = $this->calculateRemainingTime();
        // check if timeout or max question reached
        if(($remainingTime<5)||($QNO==session()->get('maxQuestions'))){
            $this->updateAnsweres($QNO, $TestPaperId, $selectedOptions);
            $this->closeTest( $TestPaperId , $QNO);
            Notification::send(auth()->user(), new TestCompleted($TestPaperId));
            $this->updateRemainingTime();

            $this->updateTestScoreCategory($TestPaperId);

            return redirect('/employee/assessment/testTaken');
        }else{
            $this->updateAnsweres($QNO, $TestPaperId, $selectedOptions);
            $this->updateTestData($TestPaperId, $QNO);
            $this->updateRemainingTime();
            session()->put('currQNo', $QNO+1);
            $questId = $this->returnQuestionId($TestPaperId, $QNO+1 );
            $objQuest = $this->getNextQuestion($questId);
            return view('employee.assessment.testpage', compact('objQuest'));
        }
    }

    public function updateAnsweres($qno, $TestPaperId, $selectedOptions){
        $result = DB::table('emp_test_questions')
                    ->where('sl_no', $qno)
                    ->where('test_id', $TestPaperId)
                    ->update([ 'ans_opt_id' => $selectedOptions]);
    }
    public function updateTestData( $TestPaperId, $qno){
        $result = DB::table('emp_tests')
                    ->where('id', $TestPaperId)
                    ->update([ 'last_q_no' => ($qno+1)]);
    }
    public function closeTest($testId, $Qno ){
        $result = DB::table('emp_tests')
                ->where('id', $testId)
                ->update([ 'last_q_no' => ($Qno+1), 'status'=>'Completed', 'test_taken'=>Carbon::now()]);
    }

    public function returnQuestionId($testId, $slNo){
        return  DB::table('emp_test_questions')->where('sl_no', $slNo)->where('test_id', $testId)->first()->q_id;
    }
    public function getNextQuestion($questionId){
          $questions = Questions::where('id',$questionId )
                       ->with('options')
                       ->first();
          return $questions;
    }

//Updation of Time
    public function updateRemainingTime(){
        $origRemTimeInSeconds = $this->calculateRemainingTime();
        session()->put('last_updateTime',Carbon::now());
        session()->put('rem_time', $origRemTimeInSeconds );
        $remTimeInFloat = round($origRemTimeInSeconds/60,2);
        $this->updateTime($remTimeInFloat);

        $timeout = $this->isTimedOut($origRemTimeInSeconds);
        if($timeout){
            $this->updateTestScoreCategory(session()->get('qptest_id'));

            $result = DB::table('emp_tests')
            ->where('id', session()->get('qptest_id'))
            ->update(['test_taken'=>Carbon::now(), 'status'=>"Completed"]);

            return response()->json(['status' => false], 202);
        }

    }
    public function calculateRemainingTime(){
        $currTimeInMilisec = strtotime(Carbon::now());
        $updatedTimeInMilisecs = strtotime(session()->get('last_updateTime'));
        $remainingTime = session()->get('rem_time');
        $totalElapsweTime = round($currTimeInMilisec-$updatedTimeInMilisecs);
        $origRemTimeInSeconds = $remainingTime - $totalElapsweTime;
        return $origRemTimeInSeconds;
    }
    public function updateTime($time){
        $test = EmpTest::find(session()->get('qptest_id'));
        $test->rem_time = $time;
        $test->save();
    }
    public function isTimedOut($origRemTimeInSeconds){
        $isTimedOut = false;
        if($origRemTimeInSeconds <= 0 )
            $isTimedOut=true;
        return $isTimedOut;
    }

    public function updateTestScoreCategory($TestPaperId){
        $testGiven = EmpTest::where('id', $TestPaperId)
                        ->with('testquestions.answeres')
                        ->orderBy('id', 'desc')
                        ->first();


        $questions = $testGiven->testquestions;
        $tot_marks = 0;
        foreach($questions as $item){
            if(isset($item->answeres->marks)){
                $marks = $item->answeres->marks;
                $tot_marks= $tot_marks + $marks;
            }
        }
        $totPercents = round(($tot_marks/10)*100 , 2);
        if($totPercents < 60 )
             $category = '4';
        elseif($totPercents >= 60 && $totPercents < 75 )
             $category = '3';
        elseif($totPercents >= 75 && $totPercents < 85 )
             $category = '2';
        elseif($totPercents >= 85  )
             $category = '1';
        $result = DB::table('emp_tests')
                    ->where('id', $TestPaperId)
                    ->update([ 'test_category' => $category]);

    }





}
