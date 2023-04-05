<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EntradasSalidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas_salidas', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->time('entrada')->nullable();
            $table->time('salida')->nullable();
            $table->date('fecha')->nullable();
            $table->string('numcon');
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('bono_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bono_id')->references('id')->on('bonos')->onDelete('cascade');
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
