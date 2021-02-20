<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidTimeOfOneHour implements Rule
{

    public $timediff;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($timediff)
    {
        $this->timediff = $timediff;
    }

    public function passes($attribute, $value)
    {
        if ($this->timediff == 60) {
            return true;
        }
    }
    public function message()
    {
        return 'The Time slot should be 1 Hour';
    }
}
