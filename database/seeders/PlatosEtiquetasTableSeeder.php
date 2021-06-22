<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlatosEtiquetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('platos_etiquetas')->truncate();
        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [1, 1, 1]);
        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [2, 1, 2]);
        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [3, 1, 3]);

        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [4, 11, 1]);
        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [5, 11, 2]);
        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [6, 11, 3]);

        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [7, 31, 1]);
        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [8, 31, 2]);
        DB::insert('insert into platos_etiquetas (id,plato_id,etiqueta_id) values (?,?,?)', [9, 31, 3]);

        Schema::enableForeignKeyConstraints();
    }
}
