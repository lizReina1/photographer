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
        Schema::create('carrito_fotografias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('fotografia_id')->nullable()
            ->constrained('fotografias')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('carrito_id')->nullable()
            ->constrained('carritos')
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
        Schema::dropIfExists('carrito_fotografias');
    }
};
