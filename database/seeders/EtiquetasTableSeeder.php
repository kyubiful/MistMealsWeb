<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EtiquetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('etiquetas')->truncate();
        DB::insert('insert into etiquetas (id,nombre) values (?,?)', [1, 'Carne']);
        DB::insert('insert into etiquetas (id,nombre) values (?,?)', [2, 'Sal']);
        DB::insert('insert into etiquetas (id,nombre) values (?,?)', [3, 'Azúcar']);
        DB::insert('insert into etiquetas (id,nombre) values (?,?)', [4, 'Producto de origen animal']);

        Schema::enableForeignKeyConstraints();
    }
}
