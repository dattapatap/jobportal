<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function education(){
        return $this->belongsTo(Education::class, 'edu_id');
    }

    public function specifications(){
        return $this->hasMany(CourseSpecifications::class, 'course_id');
    }

}
