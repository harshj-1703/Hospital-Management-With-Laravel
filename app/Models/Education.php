<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = "educations";
    // protected $primarykey = "edu_id";

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor','dr_id');
    }
}