<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarroModel;
use Illuminate\Support\Facades\Cache;
use App\Jobs\RenovaCache;

class Testcontroller extends Controller
{   
    // ==================== ROTAS DE TESTE ====================
    
    public function envia_teste(Request $request)
    {
        $data = [
            'Palmeiras' => '51',
            'numero' => $request->numero
        ];

        return response()->json($data, 200);
    }

    public function soma(Request $request)
    {
        $data = [
            'soma' => $request->numero + $request->numero_dois,
        ];

        return response()->json($data, 200);
    }

    // ==================== DASHBOARD ====================
    
    public function dashboard()
    {
        
     // Limpa o cache para garantir dados atualizados
       $data =  cache::rememberForever('dashboard', function() {

       $data = [];

        $data['totalCarros' ]= CarroModel::count();
        $data['valorTotal']= CarroModel::sum('valor');
        $data['potenciaMedia'] = CarroModel::avg('potencia');
        $data['fabricantes'] = CarroModel::distinct('fabricante')->count('fabricante');
        
        $data['carrosPorFabricante'] = CarroModel::select('fabricante', \DB::raw('count(*) as total'))
            ->groupBy('fabricante')
            ->get();
        
        $data['carrosPorCombustivel'] = CarroModel::select('tipo_gasolina', \DB::raw('count(*) as total'))
            ->groupBy('tipo_gasolina')
            ->get();
        
        $data['ultimosCarros'] = CarroModel::orderBy('id', 'desc')->limit(5)->get();

        return $data;

        });
       
        
        $dados = [
            'total_carros' => $data['totalCarros'],
            'valor_total' => $data['valorTotal'],
            'potencia_media' => round($data['potenciaMedia'], 0),
            'total_fabricantes' => $data['fabricantes'],
            'carros_por_fabricante' => $data['carrosPorFabricante'],
            'carros_por_combustivel' => $data['carrosPorCombustivel'],
            'ultimos_carros' => $data['ultimosCarros']
        ];
        
        return response()->json([
            'erro' => 'n',
            'dashboard' => $dados
        ], 200);
    }

    // ==================== CRUD DE CARROS ====================
    
    public function salva_carro(Request $request)
    {
        $request->validate([
            'modelo' => 'required',
            'ano' => 'required|integer',
            'cor' => 'required',
            'placa' => 'required|unique:carro,placa',
            'dono' => 'required',
            'valor' => 'required|numeric',
            'potencia' => 'required|integer',
            'fabricante' => 'required',
            'tipo_gasolina' => 'required|integer',
        ]);

        try {
            $carro = new CarroModel();
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

            RenovaCache::dispatch();

            return response()->json([
                "erro" => 'n',
                'mensagem' => 'Carro cadastrado com sucesso!',
                'carro' => $carro,
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                "erro" => 's',
                'mensagem' => 'Erro ao cadastrar carro: ' . $th->getMessage()
            ], 500);
        }
    }

    public function exibe_carro($id)
    {
        try {
            $carro = CarroModel::find($id);

            if (!$carro) {
                return response()->json([
                    "erro" => 's',
                    'mensagem' => 'Carro não encontrado'
                ], 404);
            }

            return response()->json([
                "erro" => 'n',
                'carro' => $carro,
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                "erro" => 's',
                'mensagem' => $th->getMessage()
            ], 500);
        }
    }

    public function todos_carros(Request $request)
    {
        try {
            $carros = CarroModel::orderBy('id', 'desc')->get();

            return response()->json([
                "erro" => 'n',
                'carro' => $carros,
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                "erro" => 's',
                'mensagem' => $th->getMessage()
            ], 500);
        }
    }

    public function alterar_carro(Request $request)
    {
        $request->validate([
            'id_carro' => 'required|exists:carro,id',
            'modelo' => 'required',
            'ano' => 'required|integer',
            'cor' => 'required',
            'placa' => 'required',
            'dono' => 'required',
            'valor' => 'required|numeric',
            'potencia' => 'required|integer',
            'fabricante' => 'required',
            'tipo_gasolina' => 'required|integer',
        ]);

        try {
            $carro = CarroModel::find($request->id_carro);
            
            if (!$carro) {
                return response()->json([
                    "erro" => 's',
                    'mensagem' => 'Carro não encontrado'
                ], 404);
            }

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

            return response()->json([
                "erro" => 'n',
                'mensagem' => 'Carro alterado com sucesso!',
                'carro' => $carro,
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                "erro" => 's',
                'mensagem' => $th->getMessage()
            ], 500);
        }
    }

    public function deletar_carro(Request $request)
    {
        $request->validate([
            'id_carro' => 'required|exists:carro,id',
        ]);
        
        try {
            $carro = CarroModel::find($request->id_carro);
            
            if (!$carro) {
                return response()->json([
                    "erro" => 's',
                    'mensagem' => 'Carro não encontrado'
                ], 404);
            }
            
            $carro->delete();
            
            return response()->json([
                'erro' => 'n',
                'mensagem' => 'Carro deletado com sucesso!'
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                "erro" => 's',
                'mensagem' => $th->getMessage()
            ], 500);
        }
    }

    // ==================== ROTAS PARA VIEWS (BLADE) ====================
    
    public function visualizar_carro($id_carro)
    {
        $carro = CarroModel::find($id_carro);

        if (!$carro) {
            return redirect()->back()->with('erro', 'Carro não encontrado');
        }

        return view('visualizar_carro')->with('id_carro', $carro->id);
    }

    public function mostra_carro($id_carro)
    {
        $carro = CarroModel::find($id_carro);

        if (!$carro) {
            return redirect()->back()->with('erro', 'Carro não encontrado');
        }

        return view('alterar_carro')->with('carro', $carro);
    }

    public function deleta_carro($id_carro)
    {
        $carro = CarroModel::find($id_carro);

        if (!$carro) {
            return redirect()->back()->with('erro', 'Carro não encontrado');
        }

        return view('deleta_carro')->with('carro', $carro);
    }
}