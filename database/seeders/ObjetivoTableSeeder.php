<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ObjetivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('objetivo')->truncate();
        DB::insert('insert into objetivo (id,nombre,coef) values (?,?,?)', [1, 'WE!GHT FIGHTER', -26]);
        DB::insert('insert into objetivo (id,nombre,coef) values (?,?,?)', [2, 'WE!GHT KEEPER', 0]);
        DB::insert('insert into objetivo (id,nombre,coef) values (?,?,?)', [3, 'WE!GHT PROMOTER', 26]);

        Schema::enableForeignKeyConstraints();
    }
}
