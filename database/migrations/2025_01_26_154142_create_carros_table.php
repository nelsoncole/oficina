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
        Schema::create('carros', function (Blueprint $table) {
            $table->bigIncrements ('id_carro');
            $table->string('modelo');
            $table->string('placa')->unique();
            $table->integer('fabricacao')->unique();
            $table->integer('ano');
            $table->enum('cor',['Preto', 'Branco', 'Vermelho', 'Azul', 'Verde','Amarelo']);
            $table->enum('marca',['Toyota', 'Ford', 'Nissan', 'Hyundai', 'Mitsubishi','Mazda','Land Rover', 'BMW']);
            $table->enum('tipo',['Civil','Emergência','Policial','Militar','Esportiva','Agrigola','Engenharia']);
            $table->enum('estado',['Em Diagnóstico','Aguardando Autorização','Aguardando Peças','Em Manutenção Preventiva','Em Retirada de Componentes','Em Reparação','Em Testes','Pronto para Retirada']);
            $table->string('tipo_de_avaria');
            $table->decimal('preco_de_avaria',8, 2);
            $table->string('codigo')->unique();
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
