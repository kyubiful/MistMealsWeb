<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MenusPesosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('menus_pesos')->truncate();
        DB::insert('insert into menus_pesos (id,valor) values (?,?)', [1, '> 80']);
        DB::insert('insert into menus_pesos (id,valor) values (?,?)', [2, '< 80']);
        DB::insert('insert into menus_pesos (id,valor) values (?,?)', [3, '> 70']);
        DB::insert('insert into menus_pesos (id,valor) values (?,?)', [4, '> 70']);

        Schema::enableForeignKeyConstraints();
    }
}
