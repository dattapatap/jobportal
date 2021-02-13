<?php

namespace App\Models;

use GuzzleHttp\RetryMiddleware;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOptions extends Model
{
    protected $fillable = ['q_id','options','marks'];


    public function questions(){
        return $this->belongsTo(Questions::class, 'q_id');
    }
    
}
