<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor','dr_id');
    }
    public function clinicimages(){
        return $this->hasMany('App\Models\Clinicimage','clinic_id')->orderBy('id','DESC')->where('status','=','1');
    }
}