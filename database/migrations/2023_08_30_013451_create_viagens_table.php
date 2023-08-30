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
        Schema::create('viagens', function (Blueprint $table) {
            $table->id();
            $table->time('horario_partida');
            $table->time('horario_chegada');
            $table->float('valor_passagem');

            $table->unsignedBigInteger('linha_id');

            $table->timestamps();

            $table->foreign('linha_id')->references('id')->on('linhas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagems');
    }
};
