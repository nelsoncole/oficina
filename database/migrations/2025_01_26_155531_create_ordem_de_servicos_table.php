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
        Schema::create('ordem_de_servicos', function (Blueprint $table) {
            $table->bigIncrements('id_ordem_servico');
            $table->float('valor_total');
            $table->date('data_inicio');
            $table->string('observacao');
            $table->time('data_encerramento');
            $table->boolean('status_os');

            $table->unsignedBigInteger('id_funcionario')->nullable();
            $table->unsignedBigInteger('id_orcamento')->nullable();
            $table->foreign('id_funcionario')->references('id_funcionario')->on('funcionarios')->onDelete('set null');
            $table->foreign('id_orcamento')->references('id_orcamento')->on('orcamentos')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordem_de_servicos');
    }
};
