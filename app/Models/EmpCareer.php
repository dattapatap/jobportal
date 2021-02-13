<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpCareer extends Model
{
    use HasFactory;
    public $table = "emp_careers";
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function industries(){
        return $this->belongsTo(Industries::class, 'industry');
    }

    public function positions(){
        return $this->belongsTo(JobPositions::class, 'position');
    }
    public function locations(){
        return $this->belongsTo(City::class, 'location_prefered');
    }



}
