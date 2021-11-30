<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MenusPlatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('menus_platos')->truncate();
        // DB::insert('insert into menus_platos (id,menu_id,plato_id) values (?,?,?)', [1, 1, 1]);

        Schema::enableForeignKeyConstraints();
    }
}
