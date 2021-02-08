<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;



    public function category(){
        return $this->belongsTo(QuestionCategory::class, 'qc_id');
    }
   

    public function options(){
        return $this->hasMany(Question::class, 'q_id');
    }

}
