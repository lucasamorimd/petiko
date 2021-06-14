<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_pedido');
            $table->integer('id_cliente');
            $table->string('CEP_cliente');
            $table->string('Endereco_cliente');
            $table->string('Cidade_cliente');
            $table->string('Estado_cliente');
            $table->string('UF_cliente');
            $table->string('Bairro_cliente');
            $table->string('Complemento_cliente');
            $table->dateTime('pedidos_updated_at')->useCurrentOnUpdate()->nullable();
            $table->dateTime('pedidos_created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
