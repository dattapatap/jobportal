<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class registerDate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $registerd_date;
    public $before_date;
    
    public function __construct($timediff)
    {
        $this->registerd_date = $timediff;
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
        $regDate = Carbon::parse($this->registerd_date)->addDay(7)->format('Y-m-d');
        $this->before_date = $regDate;

        if (  $value <= $regDate ) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your Test Date should be before '.$this->before_date;
    }
}
