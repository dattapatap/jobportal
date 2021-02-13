<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPaperQuestions extends Model
{
    use HasFactory;

    public function questionpaper(){
        return $this->belongsTo(QuestionPaper::class, 'qp_id');
    }
}
