<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturaprodutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturaProdutos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idProduto');
            $table->unsignedBigInteger('idFatura');
            $table->string('nomeProduto', 255);
            $table->float('precoProduto');
            $table->bigInteger('quantidadeProduto');

            $table->foreign('idFatura')->references('id')->on('fatura');
            $table->foreign('idProduto')->references('id')->on('produto');
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
        Schema::drop('faturaProdutos');
    }
}
