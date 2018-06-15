<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('participantes');
            $table->enum('estado', ['Funcionando', 'Mantenimiento','Desconectado']);
            $table->integer('moneda_id')->unsigned();
            $table->timestamps();
            $table->foreign('moneda_id')->references('id')->on('moneda')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pool');
    }
}
