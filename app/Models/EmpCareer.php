<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpCareer extends Model
{
    use HasFactory;
    public $table = "emp_careers";
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }



}
