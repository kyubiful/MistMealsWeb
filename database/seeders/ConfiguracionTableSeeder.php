<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ConfiguracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('configuracion')->truncate();
        //DB::insert('insert into configuracion (id,clave,valor) values (?,?,?)', [1, 'proteina', '50']);
        //DB::insert('insert into configuracion (id,clave,valor) values (?,?,?)', [2, 'hidrados', '35']);
        //DB::insert('insert into configuracion (id,clave,valor) values (?,?,?)', [3, 'grasas', '15']);
        DB::insert('insert into configuracion (id,clave,valor) values (?,?,?)', [1, 'calorias', '80']);

        Schema::enableForeignKeyConstraints();
    }
}
