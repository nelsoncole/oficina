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
        Schema::create('fi_pagamentos', function (Blueprint $table) {
            $table->bigIncrements('id_pagamento');
            $table->float('valor');
            $table->string('forma_pagamento');
            
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_orcamento');
            $table->unsignedBigInteger('id_funcionario');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_orcamento')->references('id_orcamento')->on('orcamentos')->onDelete('cascade');
            $table->foreign('id_funcionario')->references('id_funcionario')->on('funcionarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fi_pagamentos');
    }
};
