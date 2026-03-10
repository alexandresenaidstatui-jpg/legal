<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class toukeuser extends Model
{
    protected $table  ='cliente'; 

    protected $fillable = [
        'nome',
        'data_de_nascimento',
        'cpf',
        'numero',
        'email',
    
    ];
}