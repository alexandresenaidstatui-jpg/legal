<?php
// database/migrations/2026_06_18_000000_create_stores_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('cnpj', 18)->unique();
            $table->string('phone', 20);
            $table->string('email', 100)->nullable();
            $table->string('address', 255);
            $table->string('complement', 100)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('city', 100);
            $table->string('state', 2);
            $table->string('zip_code', 10)->nullable();
            $table->string('opening_hours', 200)->nullable();
            $table->text('observations')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('has_local_delivery')->default(false);
            $table->timestamps();
            $table->softDeletes(); // Para exclusão lógica
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};