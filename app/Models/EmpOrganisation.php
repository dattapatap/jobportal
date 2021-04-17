<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpOrganisation extends Model
{
    use HasFactory;


    public function organisation(){
        return $this->belongsTo(Organisation::class, 'org_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'emp_id');
    }

}
