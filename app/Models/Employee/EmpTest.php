<?php

namespace App\Models\Employee;

use App\Models\Admin\TestSlots;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpTest extends Model
{
    use HasFactory;

    public function slots(){
        return $this->belongsTo(TestSlots::class, 'slot_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'emp_id');
    }


    public function testquestions(){
        return $this->hasMany(EmpTestQuestions::class, 'test_id');
    }

}
