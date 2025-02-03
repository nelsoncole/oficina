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
            $table->integer('cpf')->unique();
            $table->enum('sexo', ['masculino', 'feminino']);
            $table->integer('rg');
            $table->string('orgaoexpedidor');
            $table->string('email')->unique();
            $table->integer('cep')->unique();
            $table->string('endereco');
            $table->integer('numero')->unique();
            $table->string('complemento');
            $table->string('bairro');
            $table->integer('telefone')->unique();
            $table->integer('celular')->unique();
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
