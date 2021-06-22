<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosMenusPlatosLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_menus_platos_log', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('menu_id')->nullable()->constrained('menus');
            $table->foreignId('plato_id')->nullable()->constrained('platos');
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
        Schema::dropIfExists('usuarios_menus_platos_log');
    }
}
