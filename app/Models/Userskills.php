<?php

namespace App\Models;

use Egulias\EmailValidator\EmailParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userskills extends Model
{
    use HasFactory;
    protected $fillable = ['emp_id', 'skill_id'];


    public function skills(){
        return $this->belongsTo(Skills::class, 'skill_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

}
