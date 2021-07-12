<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosAlergenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos_alergenos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plato_id')->nullable()->constrained('platos');
            $table->foreignId('alergeno_id')->nullable()->constrained('alergenos');
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
        Schema::dropIfExists('platos_alergenos');
    }
}
