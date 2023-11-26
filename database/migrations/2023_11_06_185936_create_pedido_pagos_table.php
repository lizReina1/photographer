<?php

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
        Schema::create('pedido_pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_pago')->format('d/m/Y H:i:s');
            $table->float('monto');
            $table->boolean('estado');
            

            $table->foreignId('carrito_id')->nullable()
            ->constrained('carritos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('tarjeta_id')->nullable()
            ->constrained('tarjetas')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_pagos');
    }
};
