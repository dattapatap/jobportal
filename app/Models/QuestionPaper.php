<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionPaper extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function category(){
        return $this->belongsTo(QPaperCategory::class, 'qp_cat');
    }
   
    public function questions(){
        return $this->hasMany(QuestionPaperQuestions::class, 'qp_id');
    }

}
