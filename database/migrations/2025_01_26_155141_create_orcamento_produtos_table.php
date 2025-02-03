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
        Schema::create('orcamento_produtos', function (Blueprint $table) {
            $table->bigIncrements ('id_orcamento_produto');
            $table->integer('qtd');
            $table->decimal('vl_unitario', 8, 2);
            $table->decimal('valor_total', 8, 2);

            $table->unsignedBigInteger('id_produto');
            $table->unsignedBigInteger('id_orcamento');
            $table->foreign('id_produto')->references('id_produto')->on('produtos')->onDelete('cascade');
            $table->foreign('id_orcamento')->references('id_orcamento')->on('orcamentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orcamento_produtos');
    }
};
