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
        Schema::create('organizador_fotografos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('organizador_id')->nullable()
            ->constrained('organizadors')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('fotografo_id')->nullable()
            ->constrained('fotografos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('evento_id')->nullable()
            ->constrained('eventos')
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
        Schema::dropIfExists('event_fotos');
    }
};
