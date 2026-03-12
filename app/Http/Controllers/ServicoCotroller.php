<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoCotroller extends Controller
{
    public function salva_servico (Request $request)
    {
        $request->validate ([

        'nome' => 'required',
        'contato' => 'required',
        'tipo' => 'required',
        'cidade' => 'required',
        'descricão' => 'required',
        'valor' => 'required',
        

    ]);

    try {
        $usuario = $request->usuario;
        $servico = new Servico();
        $servico->nome = $request->nome;
        $servico->contato = $request->contato;
        $servico->tipo = $request->tipo;
        $servico->cidade = $request->cidade;
        $servico->descricão = $request->descricão;
        $servico->valor = $request->valor;
        $servico->user_id = $usuario->id;
        $servico->save();


        $data = [
            "erro" => 'n',
            'carro' => $servico,
        ];

        return response()->json($data,200);

    } catch (\Throwable $th) {
        throw $th;
    }
    }

    public function altera_servico (Request $request)
    {
        $request->validate ([

        'nome' => 'required',
        'contato' => 'required',
        'tipo' => 'required',
        'cidade' => 'required',
        'descricão' => 'required',
        'valor' => 'required',
        

    ]);

    try {
   
        $usuario = $request->usuario;
        $servico = Servico::find($request->user_id);
        $servico->nome = $request->nome;
        $servico->contato = $request->contato;
        $servico->tipo = $request->tipo;
        $servico->cidade = $request->cidade;
        $servico->descricão = $request->descricão;
        $servico->valor = $request->valor;
        $servico->user_id = $usuario->id;
        $servico->save();


        $data = [
            "erro" => 'n',
            'carro' => $servico,
        ];

        return response()->json($data,200);

    } catch (\Throwable $th) {
        throw $th;
    }
    }
}
