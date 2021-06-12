<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlatosCodigosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('platos_codigos')->truncate();
        DB::insert('insert into platos_codigos (id,codigo,plato_peso_id,calorias) values (?,?,?,?)', [1, '1A', 1, 350]);
        DB::insert('insert into platos_codigos (id,codigo,plato_peso_id,calorias) values (?,?,?,?)', [2, '2A', 1, 450]);
        DB::insert('insert into platos_codigos (id,codigo,plato_peso_id,calorias) values (?,?,?,?)', [3, '1B', 2, 583]);
        DB::insert('insert into platos_codigos (id,codigo,plato_peso_id,calorias) values (?,?,?,?)', [4, '2B', 2, 750]);

        Schema::enableForeignKeyConstraints();
    }
}
