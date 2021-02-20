<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\Employee\EmpTest;
use App\Models\User;
use App\Notifications\TestRemainingTime;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemainingTimeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:testRemainingTime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Your Test Scheduled Remaining Time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $testAvailable = EmpTest::where('status', 'Scheduled')
                    ->with('slots')
                    ->orderBy('id', 'desc')
                    ->get();
       
        // $testAvailable->map(function($testAvailable){
            
        //     $testDate = Carbon::parse($testAvailable->testDate)->format('Y-m-d');
        //     $nowDate = Carbon::now()->format('Y-m-d');
        //     if($testDate == $nowDate ){
        //         $slots = $testAvailable->slots;
        //         $slotLastTime= Carbon::parse($slots->from);
        //         $nowDate = Carbon::now();
        //         $stime = ($slotLastTime->hour * 60) + $slotLastTime->minute;
        //         $estime = ($nowDate->hour * 60) + $nowDate->minute;
        //         $remainingTime = $stime - $estime;
        //         if($remainingTime < 15 && $remainingTime > 5){
        //             $emp = Employee::where('id', $testAvailable->emp_id)->first();
        //             $user = User::where('id',$emp->user_id)->first();
        //             $user->notify(new TestRemainingTime( $user ));                    
        //         }
        //     }            
        // });

    }
}
