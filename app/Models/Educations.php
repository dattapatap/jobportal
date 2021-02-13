<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = ['emp_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function educ(){
        return $this->belongsTo(Education::class, 'education');
    }

    public function cour(){
        return $this->belongsTo(Courses::class, 'qualification');
    }
    public function spec(){
        return $this->belongsTo(CourseSpecifications::class, 'specification');
    }

}
