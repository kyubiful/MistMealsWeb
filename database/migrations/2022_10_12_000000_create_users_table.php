<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('photo')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('DNI')->unique()->nullable();
            $table->string('city')->nullable();
            $table->integer('cp')->nullable();
            $table->string('address')->nullable();
            $table->decimal('peso')->nullable();
            $table->decimal('altura')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('tmb')->nullable();
            $table->integer('calorias_consumidas')->nullable();
            $table->integer('calorias_propuestas')->nullable();
            $table->foreignId('sexo_id')->nullable()->constrained('sexo');
            $table->foreignId('profesion_id')->nullable()->constrained('profesiones');
            $table->foreignId('menu_id')->nullable()->constrained('menus');
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->foreignId('nivel_ejercicio_id')->nullable()->constrained('nivel_ejercicio');
            $table->foreignId('objetivo_id')->nullable()->constrained('objetivo');
            $table->foreignId('estado_civil_id')->nullable()->constrained('estado_civil');
            $table->foreignId('estado_laboral_id')->nullable()->constrained('estado_laboral');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
