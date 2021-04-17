<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TestSlotTimeValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $slots, $testDate, $testSlot;

    public function __construct($request, $slots)
    {
        $this->slots= $slots;
        $this->testDate = $request->testdate;
        $this->testSlot = $request->testslot;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //TestDate
        $testDate = Carbon::parse($this->testDate)->format('Y-m-d');
        $nowDate = Carbon::now()->format('Y-m-d');
        if($testDate > $nowDate ){
            return true;
        }
        if($testDate == $nowDate){
            $slotLastTime= Carbon::parse($this->slots->from); // Take Slat Last Time
            $nowDate = Carbon::now();
            $stime = ($slotLastTime->hour * 60) + $slotLastTime->minute;
            $estime = ($nowDate->hour * 60) + $nowDate->minute;
            if($stime > ($estime+20)){
                return true;
            }else{
                return false;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Select Another Test Slot, This is not valid slot';
    }
}
