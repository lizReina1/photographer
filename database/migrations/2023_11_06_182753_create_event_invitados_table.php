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
        Schema::create('event_invitados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('evento_id')->nullable()
            ->constrained('eventos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('invitados_id')->nullable()
            ->constrained('invitados')
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
        Schema::dropIfExists('event_invitados');
    }
};
