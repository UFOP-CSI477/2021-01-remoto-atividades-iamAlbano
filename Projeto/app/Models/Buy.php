<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function input(){
        return $this->belongsToMany('App\Models\Input');
    }

    protected $dates = ['date'];

    
}
