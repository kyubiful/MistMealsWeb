<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->text('ingredientes')->nullable();
            $table->text('receta')->nullable();
            $table->decimal('calorias');
            $table->string('imagen_1');
            $table->string('imagen_2');
            $table->decimal('precio');
            $table->foreignId('plato_codigo_id')->nullable()->constrained('platos_codigos');
            $table->foreignId('base_proteina_id')->nullable()->constrained('base_proteina');
            $table->foreignId('plato_peso_id')->nullable()->constrained('platos_pesos');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('platos');
    }
}
