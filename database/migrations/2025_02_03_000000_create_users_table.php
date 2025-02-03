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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->enum('nivel_de_acesso', ['Administrador', 'Gerente', 'Secretário', 'Técnico', 'Cliente']);
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_funcionario')->nullable();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('set null');
            $table->foreign('id_funcionario')->references('id_funcionario')->on('funcionarios')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
