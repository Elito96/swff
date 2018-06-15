<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Balance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('balance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cantidad');
            $table->enum('estado', ['Acreditado', 'Esperando confirmación','Esperando deposito']);
            $table->integer('moneda_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();
            $table->foreign('moneda_id')->references('id')->on('moneda')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuario')
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
        Schema::dropIfExists('balance');
    }
}
