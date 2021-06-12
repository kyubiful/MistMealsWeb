<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProfesionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('profesiones')->truncate();
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [1, 'Agricultor o ganadero']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [2, 'Responsable de tareas del hogar']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [3, 'Autónomo']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [4, 'Comercial o Vendedor representante']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [5, 'Conductor profesional']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [6, 'Directivo']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [7, 'Empleado administrativo o técnico']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [8, 'Empleado de Banca o seguros']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [9, 'Empresario']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [10, 'Estudiante']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [11, 'Fuerzas de seguridad y militares']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [12, 'Funcionario']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [13, 'Médico y otras profesiones sanitarias']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [14, 'Mecánico']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [15, 'Operario']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [16, 'Profesor']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [17, 'Pensionista / Jubilado']);
        DB::insert('insert into profesiones (id,nombre) values (?,?)', [18, 'Sin ocupación o empleo']);

        Schema::enableForeignKeyConstraints();
    }
}
