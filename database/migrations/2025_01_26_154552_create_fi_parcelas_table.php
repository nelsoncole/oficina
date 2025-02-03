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
        Schema::create('fi_parcelas', function (Blueprint $table) {
            $table->bigIncrements ('id_parcela');
            $table->decimal('valor', 8 ,2);
            $table->integer('num_parcela');
            $table->date('data_pagamento');
            $table->date('data_processamento');
            $table->date('data_hora_criacao');
            $table->string('bandeira');
            $table->string('num_cartao');
            $table->enum('forma_pagamento',['numerario','prazo','cartao']);

            $table->unsignedBigInteger('id_pagamento');
            $table->foreign('id_pagamento')->references('id_pagamento')->on('fi_pagamentos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fi_parcelas');
    }
};
