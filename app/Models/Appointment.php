<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = "appointments";

    public function patients(){
        return $this->belongsTo('App\Models\Patient','patient_id');
    }

    public function doctors(){
        return $this->belongsTo('App\Models\Doctor','dr_id');
    }
}
