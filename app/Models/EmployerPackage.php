<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployerPackage extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function payment(){
        return $this->belongsTo(Payments::class, 'payment_id');
    }

    public function emp(){
        return $this->belongsTo(Recruiter::class, 'rec_id');
    }

}
