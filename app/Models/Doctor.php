<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function educations(){
        return $this->hasMany('App\Models\Education','dr_id');
    }
    public function experiences(){
        return $this->hasMany('App\Models\Experience','dr_id');
    }
    public function awards(){
        return $this->hasMany('App\Models\Award','dr_id');
    }
    public function memberships(){
        return $this->hasMany('App\Models\Membership','dr_id');
    }
    public function registrations(){
        return $this->hasMany('App\Models\Registration','dr_id');
    }
    public function clinics(){
        return $this->hasMany('App\Models\Clinic','dr_id');
    }
    public function socialmedias(){
        return $this->hasOne('App\Models\Socialmedia','dr_id');
    }

    public function sunday(){
        return $this->hasmany('App\Models\Doctorschedule','dr_id')->where('dayid','=','0')->where('status','=','1');
    }
    public function monday(){
        return $this->hasmany('App\Models\Doctorschedule','dr_id')->where('dayid','=','1')->where('status','=','1');
    }
    public function tuesday(){
        return $this->hasmany('App\Models\Doctorschedule','dr_id')->where('dayid','=','2')->where('status','=','1');
    }
    public function wednesday(){
        return $this->hasmany('App\Models\Doctorschedule','dr_id')->where('dayid','=','3')->where('status','=','1');
    }
    public function thursday(){
        return $this->hasmany('App\Models\Doctorschedule','dr_id')->where('dayid','=','4')->where('status','=','1');
    }
    public function friday(){
        return $this->hasmany('App\Models\Doctorschedule','dr_id')->where('dayid','=','5')->where('status','=','1');
    }
    public function saturday(){
        return $this->hasmany('App\Models\Doctorschedule','dr_id')->where('dayid','=','6')->where('status','=','1');
    }

    public function appointments(){
        return $this->hasMany('App\Models\Appointment','dr_id');
    }

    public function favourites(){
        return $this->hasMany('App\Models\Favourite','dr_id');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review','dr_id');
    }

    public function notifications(){
        return $this->hasMany('App\Models\Notification','dr_id');
    }

    public function blogs(){
        return $this->hasMany('App\Models\Blog','dr_id');
    }

    protected $fillable = [
        'username','email','firstname','lastname','phoneno','password','gender','dob','profileimage',
        'biography','address1','address2','city','state','country','pincode','service','specialization',
        'general_cons_price','videocallprice','voicecallprice','status','slug',
    ];

}