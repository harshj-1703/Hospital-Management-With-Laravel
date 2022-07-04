<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    use HasFactory;
    protected $table = "socialmedias";

    protected $fillable = ['yt','fb','twitter','insta','pinterest','linkedin','dr_id'];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor','dr_id');
    }
}