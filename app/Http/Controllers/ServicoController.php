<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Usuario;

class ServicoController extends Controller
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

        public function mostra_servico($id_servico){

        $servico = Servico::find($id_servico);

        return view('alterar_servico')->with('servico',$servico);

    }

    public function altera_servico (Request $request){

       
            
        
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
        if ($servico->$user_id == $usuario->user_id){
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
        }
        else{
            $data = [
            "erro" => 's',
            
        ];
        }

        return response()->json($data,200);

    } catch (\Throwable $th) {
        throw $th;
    }
    }
}
