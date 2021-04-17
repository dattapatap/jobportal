<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpAudit extends Model
{
    use HasFactory;

    public function audits(){
        return $this->belongsTo(Audit::class, 'audit');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'emp_id');
    }



}
