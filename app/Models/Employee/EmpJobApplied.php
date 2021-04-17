<?php

namespace App\Models\Employee;

use App\Models\Employee;
use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpJobApplied extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function job(){
        return $this->belongsTo(Jobs::class, 'job_id');
    }

}
