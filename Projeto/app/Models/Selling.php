<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function input(){
        return $this->belongsToMany('App\Models\Products');
    }

    protected $dates = ['date'];

    
}
