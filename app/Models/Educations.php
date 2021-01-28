<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = ['emp_id'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

}
