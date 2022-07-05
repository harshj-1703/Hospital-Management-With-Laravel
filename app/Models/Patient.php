<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = "patients";

    public function appointments(){
        return $this->hasMany('App\Models\Appointment','patient_id');
    }

    public function last_appointments(){
        return $this->hasOne('App\Models\Appointment','patient_id')->orderBy('id','DESC');
    }

    public function favourites(){
        return $this->hasMany('App\Models\Favourite','patient_id');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review','patient_id');
    }

    public function notifications(){
        return $this->hasMany('App\Models\Notification','patient_id');
    }

    protected $fillable = [
        'email','username','firstname','lastname','phoneno','password','gender','dob','profileimage',
        'groupofblood','address','city','state','country','pincode','status',
    ];
}
