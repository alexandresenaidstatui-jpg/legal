<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testcontroller;
use App\http\Controllers\UsuarioController;
use App\Http\Controllers\ServicoCotroller;
use App\Http\Middleware\auth_api;


Route::get('/login_novo',[UsuarioController::class,'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cadastrar_usuario',[UsuarioController::class,'cadastra_usuario']);

Route::get('/teste',[Testcontroller::class,'envia_teste']);

Route::get('/soma',[Testcontroller::class,'soma']);

Route::get('/exibe_carro/{id}',[Testcontroller::class,'exibe_carro']);

Route::get('/todos_carros',[Testcontroller::class,'todos_carros']);

Route::get('/login',[UsuarioController::class,'login']);


Route::middleware(auth_api::class)->group(function(){
    Route::put('/alterar_carro',[Testcontroller::class,'alterar_carro']);
    Route::post('/salva_carro',[Testcontroller::class,'salva_carro']);
    Route::delete('/deletar_carro',[Testcontroller::class,'deletar_carro']);
    Route::post('/servico',[ServicoCotroller::class,'salva_servico']);
    Route::put('/alterar_carro',[ServicoCotroller::class,'alterar_carro']);
});






