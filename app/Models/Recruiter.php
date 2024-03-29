<?php

namespace App\Models;

use Illuminate\Contracts\Queue\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;
    protected $fillable = ['company_name','user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobs(){
        return $this->hasMany(Jobs::class, 'rec_id');
    }

}
