<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testcontroller;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicoController;

// ==================== ROTAS DE USUÁRIO ====================
Route::post('/cadastrar_usuario', [UsuarioController::class, 'cadastra_usuario']);
Route::get('/login', [UsuarioController::class, 'login']);
Route::get('/perfil', [UsuarioController::class, 'mostra_perfil']);

// ==================== ROTAS DE TESTE ====================
Route::get('/teste', [Testcontroller::class, 'envia_teste']);
Route::get('/soma', [Testcontroller::class, 'soma']);

// ==================== ROTAS DE CARROS ====================
Route::get('/dashboard', [Testcontroller::class, 'dashboard']);
Route::get('/exibe_carro/{id}', [Testcontroller::class, 'exibe_carro']);
Route::get('/todos_carros', [Testcontroller::class, 'todos_carros']);
Route::post('/salva_carro', [Testcontroller::class, 'salva_carro']);
Route::put('/alterar_carro', [Testcontroller::class, 'alterar_carro']);
Route::delete('/deletar_carro', [Testcontroller::class, 'deletar_carro']);

// ==================== ROTAS DE SERVIÇO ====================
Route::post('/servico', [ServicoController::class, 'salva_servico']);
Route::put('/alterar_servico', [ServicoController::class, 'alterar_servico']);

// ==================== ROTA COM MIDDLEWARE ====================
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');