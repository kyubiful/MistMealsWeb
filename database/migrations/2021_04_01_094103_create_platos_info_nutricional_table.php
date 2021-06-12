<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosInfoNutricionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos_info_nutricional', function (Blueprint $table) {
            $table->id();
            $table->decimal('energia');
            $table->decimal('calorias');
            $table->decimal('proteinas');
            $table->decimal('grasas');
            $table->decimal('saturadas');
            $table->decimal('carbohidratos');
            $table->decimal('azucar');
            $table->decimal('fibra');
            $table->decimal('sodio');
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
        Schema::dropIfExists('platos_info_nutricional');
    }
}
