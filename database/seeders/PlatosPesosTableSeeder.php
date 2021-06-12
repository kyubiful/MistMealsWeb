<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlatosPesosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('platos_pesos')->truncate();
        DB::insert('insert into platos_pesos (id,valor,peso) values (?,?,?)', [1, 'M', 300]);
        DB::insert('insert into platos_pesos (id,valor,peso) values (?,?,?)', [2, 'L', 500]);

        Schema::enableForeignKeyConstraints();
    }
}
