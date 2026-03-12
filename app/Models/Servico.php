<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{

    protected $table ='servico';
        protected $fillable = [
        'nome',
        'contato',
        'tipo',
        'cidade',
        'descricão',
        'valor',
        'user_id'
    ];
}
