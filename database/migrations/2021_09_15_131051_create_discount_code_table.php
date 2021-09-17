<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_code', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('value');
            $table->string('tipo');
            $table->datetime('start');
            $table->datetime('end');
            $table->integer('uses')->default(0);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('discount_code');
    }
}
