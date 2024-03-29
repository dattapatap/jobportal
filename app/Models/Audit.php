<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Audit extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function countries(){
        return $this->belongsTo(Country::class, 'country');
    }
}
