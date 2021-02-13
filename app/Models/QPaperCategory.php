<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QPaperCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function questionpaper(){
        return $this->belongsTo(QuestionPaper::class);
    }
}
