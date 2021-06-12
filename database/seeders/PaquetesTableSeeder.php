<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PaquetesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('paquetes')->truncate();
        DB::insert('insert into paquetes (id,numero_platos,descuento) values (?,?,?)', [1, 5, 10]);
        DB::insert('insert into paquetes (id,numero_platos,descuento) values (?,?,?)', [2, 6, 12]);
        DB::insert('insert into paquetes (id,numero_platos,descuento) values (?,?,?)', [3, 7, 14]);
        DB::insert('insert into paquetes (id,numero_platos,descuento) values (?,?,?)', [4, 10, 15]);
        DB::insert('insert into paquetes (id,numero_platos,descuento) values (?,?,?)', [5, 12, 18]);
        DB::insert('insert into paquetes (id,numero_platos,descuento) values (?,?,?)', [6, 14, 20]);

        Schema::enableForeignKeyConstraints();
    }
}
