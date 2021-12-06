<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->hasOne('App\Models\Product');
    }

    public function buy(){
        return $this->belongsToMany('App\Models\Buy');
    }

    
}
