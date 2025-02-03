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
            $table->bigIncrements ('id_funcionario');
            $table->string('nome');
            $table->string('rg');
            $table->string('cpf')->unique();
            $table->string('funcao');
            $table->timestamp('data_hora');
            $table->boolean('status_funcionario');
            $table->date('data_nascimento');
            $table->integer('telefone')->unique();
            $table->timestamps();
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
