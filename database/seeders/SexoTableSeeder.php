<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SexoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('sexo')->truncate();
        DB::insert('insert into sexo (id,nombre) values (?,?)', [1, 'Mujer']);
        DB::insert('insert into sexo (id,nombre) values (?,?)', [2, 'Hombre']);

        Schema::enableForeignKeyConstraints();
    }
}
