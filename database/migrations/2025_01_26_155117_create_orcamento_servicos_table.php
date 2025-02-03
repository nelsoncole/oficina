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
        Schema::create('orcamento_servicos', function (Blueprint $table) {
            $table->bigIncrements ('id_ordem_de_servico');
            $table->float('qtd');
            $table->float('vl_unitario');
            $table->float('valor_total');

            $table->unsignedBigInteger('id_servico');
            $table->unsignedBigInteger('id_orcamento');
            $table->foreign('id_orcamento')->references('id_orcamento')->on('orcamentos')->onDelete('cascade');
            $table->foreign('id_servico')->references('id_servico')->on('servicos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orcamento_servicos');
    }
};
