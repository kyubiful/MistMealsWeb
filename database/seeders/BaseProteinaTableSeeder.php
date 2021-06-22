<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BaseProteinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('base_proteina')->truncate();
        DB::insert('insert into base_proteina (id,nombre) values (?,?)', [1, 'Carne Roja']);
        DB::insert('insert into base_proteina (id,nombre) values (?,?)', [2, 'Carne Ave']);
        DB::insert('insert into base_proteina (id,nombre) values (?,?)', [3, 'Pescado / Marisco']);
        DB::insert('insert into base_proteina (id,nombre) values (?,?)', [4, 'Legumbre']);

        Schema::enableForeignKeyConstraints();
    }
}
