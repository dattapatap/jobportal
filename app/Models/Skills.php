<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skills extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['description'];

    public function question(){
        return $this->belongsTo(Questions::class);
    }
}
