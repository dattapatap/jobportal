<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSpecifications extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function courses(){
        return $this->belongsTo(courses::class, 'course_id');
    }

}
