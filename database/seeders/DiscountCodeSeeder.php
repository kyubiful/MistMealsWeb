<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DiscountCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('discount_code')->truncate();
        DB::insert('insert into discount_code (name,value,tipo,start,end,active) values (?,?,?,?,?,?)', ['lanzamiento', 95,'porcentaje','2021-09-15 00:00:00', '2021-09-23 00:00:00', true]);

        Schema::enableForeignKeyConstraints();
    }
}
