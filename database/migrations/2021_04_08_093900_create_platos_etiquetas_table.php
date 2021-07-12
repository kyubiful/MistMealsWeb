<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosEtiquetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos_etiquetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plato_id')->nullable()->constrained('platos');
            $table->foreignId('etiqueta_id')->nullable()->constrained('etiquetas');
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
        Schema::dropIfExists('platos_etiquetas');
    }
}
