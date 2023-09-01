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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->unique();
            // $table->unsignedBigInteger('empresa_id');
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('user_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            # chaves estrangeiras
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('empresa_id')->references('id')->on('empresas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
