<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Cache;
use App\Models\CarroModel;

class RenovaCache implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        cache::forget('dashboard');
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
    }
}
