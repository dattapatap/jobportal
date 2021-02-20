<?php

namespace App\Models\Employee;

use App\Models\QuestionOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpTestQuestions extends Model
{
    use HasFactory;


    public function emptest(){
        return $this->belongsTo(EmpTest::class, 'test_id');
    }

    public function answeres(){
        return $this->belongsTo(QuestionOptions::class, 'ans_opt_id');
    }

}
