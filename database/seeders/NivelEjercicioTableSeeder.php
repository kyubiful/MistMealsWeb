<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NivelEjercicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('nivel_ejercicio')->truncate();
        DB::insert('insert into nivel_ejercicio (id,nombre,coef) values (?,?,?)', [1, 'Nada', 1.2]);
        DB::insert('insert into nivel_ejercicio (id,nombre,coef) values (?,?,?)', [2, 'Ligero', 1.375]);
        DB::insert('insert into nivel_ejercicio (id,nombre,coef) values (?,?,?)', [3, 'Moderado', 1.55]);
        DB::insert('insert into nivel_ejercicio (id,nombre,coef) values (?,?,?)', [4, 'Intenso', 1.725]);

        Schema::enableForeignKeyConstraints();
    }
}
