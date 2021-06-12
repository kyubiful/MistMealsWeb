<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EstadoLaboralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('estado_laboral')->truncate();
        DB::insert('insert into estado_laboral (id,nombre) values (?,?)', [1, 'Estudiante']);
        DB::insert('insert into estado_laboral (id,nombre) values (?,?)', [2, 'Trabajador']);

        Schema::enableForeignKeyConstraints();
    }
}
