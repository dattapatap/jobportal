<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function category(){
        return $this->belongsTo(QuestionCategory::class, 'qc_id');
    }
   
    public function options(){
        return $this->hasMany(QuestionOptions::class, 'q_id');
    }

}
