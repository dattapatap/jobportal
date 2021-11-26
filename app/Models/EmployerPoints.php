<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployerPoints extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function emp(){
        return $this->belongsTo(Recruiter::class, 'rec_id');
    }

}
