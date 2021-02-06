<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = ['emp_id'];


    public function recruiter(){
        return $this->belongsTo(Recruiter::class, 'rec_id');
    }

}
