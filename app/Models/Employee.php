<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Educations;
use App\Models\Employee\EmpTest;
use App\Models\Employee\Interest;
use App\Models\Experience;
use App\Models\Userskills;


class Employee extends Model
{
    use HasFactory;
    public $table = "employee";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function educations(){
        return $this->hasMany(Educations::class, 'emp_id');
    }
    public function careers(){
        return $this->hasOne(EmpCareer::class, 'emp_id');
    }
    public function experience(){
        return $this->hasMany(Experience::class, 'emp_id');
    }
    public function userskills(){
        return $this->hasMany(Userskills::class, 'emp_id');
    }

    public function empAudits(){
        return $this->hasMany(EmpAudit::class, 'emp_id');
    }

    public function empOrgnisations(){
        return $this->hasMany(EmpOrganisation::class, 'emp_id');
    }

    public function test(){
        return $this->hasMany(EmpTest::class, 'emp_id');
    }

    public function interest(){
        return $this->hasMany(Interest::class, 'emp_id');
    }







}
