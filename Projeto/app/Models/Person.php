<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function contact(){
        return $this->hasOne('App\Models\Contact');
    }

    public function address(){
        return $this->hasOne('App\Models\Address');
    }

    public function person(){
        return $this->belongsTo('App\Models\Buy');
    }
}
