<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome',150);
            $table->decimal('preco_unit',16);
            $table->enum('categoria', ['Doces e tortas', 'Salgados', 'Cafés'])->nullable();/*enum para seleção de pré definições */
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
