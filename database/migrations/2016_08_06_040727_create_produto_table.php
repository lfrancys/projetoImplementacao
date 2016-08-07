<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idCategoria');
            $table->string('fotoProduto', 36);
            $table->string('nomeProduto', 255);
            $table->float('precoProduto');
            $table->float('estoqueProduto');
            $table->boolean('destaqueProduto')->default(false);

            $table->foreign('idCategoria')->references('id')->on('categoria');
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
        Schema::drop('produto');
    }
}
