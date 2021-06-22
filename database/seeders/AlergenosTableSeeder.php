<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlergenosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('alergenos')->truncate();
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [1, 'Huevos']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [2, 'Pescado']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [3, 'Cacahuete']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [4, 'Soja']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [5, 'Lacteos']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [6, 'Frutos de cáscara']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [7, 'Apio']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [8, 'Mostaza']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [9, 'Granos de sésamo']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [10, 'Sulfitos']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [11, 'Moluscos']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [12, 'Altramuces']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [13, 'Gluten']);
        DB::insert('insert into alergenos (id,nombre) values (?,?)', [14, 'Crustaceos']);

        Schema::enableForeignKeyConstraints();
    }
}
