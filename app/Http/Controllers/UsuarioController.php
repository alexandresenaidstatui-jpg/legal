<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\toukeuser;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function cadastra_usuario(Request $request){
        
        $request->validate([
            'nome'=>'required',
            'email'=>'required',
            'senha'=>'required',
            'telefone'=>'required', 
            'nascimento'=>'required',
            'genero'=>'required',
        ]);
        try {
            $usuario = new Usuario();
            $usuario->email = $request->email;
            $usuario->nome = $request->nome;
            $usuario->telefone = $request->telefone;
            $usuario->nascimento = $request->nascimento;
            $usuario->genero = $request->genero;
           $usuario->senha = md5($request->senha);
           $usuario->save();
            
           $data =[
                'erro' => 'n',
                'data' => $usuario
           ];
           return response()->json($data, 200);

        } catch (\Throwable $th) {
            throw $th;
            
             $data =[
                'erro' => 's',
                'data' => 'Erro ao Cadastrar Usuario'
           ];
           return response()->json($data, 200);
        }
    }

    public function login(Request $request){
     $request->validate([
    'email'=> 'required',
    'senha'=> 'required',
     ]);

     $usuario = Usuario::where('email', $request->email)
     ->where('senha','=',md5($request->senha))->get()->first();

    if($usuario){
        toukeuser::where('user_id',$usuario->id)->delete();
        $token = new toukeuser();
        $token->user_id = $usuario->id;
        $data = date('Y-m-d H:i:s');
        $token->token = md5($request->user_id . $usuario->email . $data);
        $agora = Carbon::now();
        $agora->addDays(7);
        $token->valido_ate = $agora;
        $token->save();

        $data = [
        'erro'=> 'n',
        'msg'=> 'Usuario Logado!',
        'token' => $token->token
        ];

        return response()->json($data, 200);

    }else{
        $data = [
        'erro'=> 's',
        'msg'=> 'Usuario negado!',
        ];

        return response()->json($data, 200);


    }
    }

        public function mostra_perfil($id){

        $usuario = Usuario::find($id);

        return view('perfil')->with('usuario',$usuario);

    }

    public function alterar_usuario(Request $request){
    
    {$request ->validate ([

    'modelo' => 'required',
    'ano' => 'required',
    'cor' => 'required',
    'placa' => 'required',
    'dono' => 'required',
    'valor' => 'required',
    'potencia' => 'required',
    'fabricante' => 'required',
    'tipo_gasolina' => 'required',
    'id_carro' => 'required'
    

    ]);

    try {



        $carro = CarroModel::find($request->id_carro);
        $carro->modelo = $request->modelo;
        $carro->ano = $request->ano;
        $carro->cor = $request->cor;
        $carro->placa = $request->placa;
        $carro->dono = $request->dono;
        $carro->valor = $request->valor;
        $carro->potencia = $request->potencia;
        $carro->fabricante = $request->fabricante;
        $carro->tipo_gasolina = $request->tipo_gasolina;
        $carro->save();


        $data = [
            "erro" => 'n',
            'carro' => $carro,
        ];

        return response()->json($data,200);

    } catch (\Throwable $th) {
        //throw $th;
    }

    }

    }
}