<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('peso', 6, 2);
            $table->decimal('hidratos', 4, 2);
            $table->decimal('proteinas', 4, 2);
            $table->decimal('grasas', 4, 2);
            $table->decimal('calorias', 6, 2);
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
        Schema::dropIfExists('ingredientes');
    }
}
