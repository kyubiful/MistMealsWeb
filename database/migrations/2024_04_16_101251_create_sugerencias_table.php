<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSugerenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugerencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->text('descripcion');
            $table->text('respuesta')->nullable();
            $table->boolean('revisado')->default(0);
            $table->bigInteger('mensaje_user_id')->unsigned()->nullable();
            $table->foreign('mensaje_user_id')->references('id')->on('users');
            $table->bigInteger('respuesta_user_id')->unsigned()->nullable();
            $table->foreign('respuesta_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('sugerencias');
    }
}
