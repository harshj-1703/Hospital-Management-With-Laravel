<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinicimage extends Model
{
    use HasFactory;
    public function clinic(){
        return $this->belongsTo('App\Models\Clinic','clinic_id');
    }
}