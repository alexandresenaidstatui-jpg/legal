<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table  ='usuario'; 

    protected $fillable = [
        'numero',
        'email',
        'nome',
        'senha',
        'telefone',
        'nascimento',
        'genero',
    ];
}
