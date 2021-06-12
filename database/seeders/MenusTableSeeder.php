<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('menus')->truncate();
        DB::insert('insert into menus (id,nombre,num_total_platos,plato_codigo_id,sexo_id,menu_peso_id) values (?,?,?,?,?,?)', [1, 'Ganar Peso 1', 5, 1, 1, 1]);
        DB::insert('insert into menus (id,nombre,num_total_platos,plato_codigo_id,sexo_id,menu_peso_id) values (?,?,?,?,?,?)', [2, 'Ganar Peso 2', 5, 2, 1, 2]);
        DB::insert('insert into menus (id,nombre,num_total_platos,plato_codigo_id,sexo_id,menu_peso_id) values (?,?,?,?,?,?)', [3, 'Ganar Peso 3', 5, 3, 2, 3]);
        DB::insert('insert into menus (id,nombre,num_total_platos,plato_codigo_id,sexo_id,menu_peso_id) values (?,?,?,?,?,?)', [4, 'Ganar Peso 4', 5, 4, 2, 4]);

        Schema::enableForeignKeyConstraints();
    }
}
