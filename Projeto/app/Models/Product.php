<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function selling(){
        return $this->belongsTo('App\Models\Selling');
    }
}
