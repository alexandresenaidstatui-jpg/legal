<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carro', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->integer('ano');
            $table->string('cor');
            $table->string('placa')->unique();
            $table->string('dono');
            $table->decimal('valor', 10, 2);
            $table->integer('potencia');
            $table->string('fabricante');
            $table->integer('tipo_gasolina');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carro');
    }
};