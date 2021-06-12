<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('estado_civil')->truncate();
        DB::insert('insert into estado_civil (id,nombre) values (?,?)', [1, 'Soltero/a']);
        DB::insert('insert into estado_civil (id,nombre) values (?,?)', [2, 'Pareja de hecho']);
        DB::insert('insert into estado_civil (id,nombre) values (?,?)', [3, 'Casado/a']);
        DB::insert('insert into estado_civil (id,nombre) values (?,?)', [4, 'Divorciado/a']);

        Schema::enableForeignKeyConstraints();
    }
}
