<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->bigInteger('agencia_id');
            $table->foreign('agencia_id')->references('id')->on('agencias');
            $table->string('numero', 120);
            $table->string('tipo', 8);
            $table->float('saldo')->default(0.0);
            $table->boolean('is_ativo')->default(false);
            $table->unique(['agencia_id', 'numero', 'tipo'], 'agencia_id_numero_tipo_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
