<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clienteFatura');
            $table->string('ipClienteFatura');
            $table->float('valorFatura');
            $table->text('obsFatura');

            $table->foreign('clienteFatura')->references('idPessoa')->on('pessoa');
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
        Schema::drop('fatura');
    }
}
