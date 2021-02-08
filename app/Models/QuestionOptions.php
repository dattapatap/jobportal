<?php

namespace App\Models;

use GuzzleHttp\RetryMiddleware;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class QuestionOptions extends Model
{
    use HasFactory;


    public function questions(){
        return $this->belongsTo(Question::class, 'q_id');
    }
}
