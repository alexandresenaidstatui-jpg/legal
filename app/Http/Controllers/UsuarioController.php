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
     ->where('senha','=',md5($request->senha))->get()->firts();

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
        'token' => $token->$token
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
}