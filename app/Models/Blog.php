<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    public function admins(){
        return $this->belongsTo('App\Models\Admin','admin_id');
    }

    public function doctors(){
        return $this->belongsTo('App\Models\Doctor','dr_id');
    }
}
