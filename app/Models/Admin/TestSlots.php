<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestSlots extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function emptest(){
        return $this->belongsTo(EmpTest::class);
    }

}
