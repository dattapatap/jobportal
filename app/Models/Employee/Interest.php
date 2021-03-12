<?php

namespace App\Models\Employee;

use App\Models\Employee;
use App\Models\Recruiter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function recruiter(){
        return $this->belongsTo(Recruiter::class, 'rec_id');
    }
}
