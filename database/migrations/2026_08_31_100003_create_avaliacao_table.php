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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');/*armazena o id do produto */
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');/*conexão com a chave primária (id)*/
            $table->enum('nota', ['⭐⭐⭐⭐⭐', '⭐⭐⭐⭐', '⭐⭐⭐', '⭐⭐', '⭐'])->nullable();/*enum para seleção de pré definições */
            $table->string('comentario',250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao');
    }
};
