<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('num_total_platos');
            $table->foreignId('plato_codigo_id')->nullable()->constrained('platos_codigos');
            $table->foreignId('sexo_id')->nullable()->constrained('sexo');
            $table->foreignId('menu_peso_id')->nullable()->constrained('menus_pesos');
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
        Schema::dropIfExists('menus');
    }
}
