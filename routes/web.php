<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/formulario', function () {
    return view('formulario');
});

Route::get('/visualiza_carro/{id_carro}',[TestController::class,'visualizar_carro']);

Route::get('/alterar_carro/{id_carro}',[Testcontroller::class,'mostra_carro']);

Route::get('/deleta_carro/{id_carro}',[Testcontroller::class,'deleta_carro']);

require __DIR__.'/auth.php';
