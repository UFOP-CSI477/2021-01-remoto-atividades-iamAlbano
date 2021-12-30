<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class);
    }

    public function vacina()
    {
        return $this->hasOne(Vacina::class);
    }

    public function unidade()
    {
        return $this->hasOne(Unidade::class);
    }
    
}
