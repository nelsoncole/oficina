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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id_cliente');
            $table->string('nome');
            $table->date('dtnascimento');
            $table->string('cpf')->unique();
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->string('rg')->unique();
            $table->string('orgaoexpedidor');
            $table->string('email')->unique();
            $table->integer('cep');
            $table->string('endereco');
            $table->integer('numero');
            $table->string('bairro');
            $table->integer('telefone')->unique();
            $table->string('documento');
            $table->unsignedBigInteger('id_cidade')->nullable();
            $table->foreign('id_cidade')->references('id_cidade')->on('cidades')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
