<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'rec_id','job_title','job_role','job_industry','job_type', 'min_salary', 'max_salary',
                            'min_exp', 'max_exp', 'job_location','job_eligibility','job_tot_positions', 'job_image', 'job_desc'];

       
    public function recruiter(){
        return $this->belongsTo(Recruiter::class, 'rec_id');
    }

}
