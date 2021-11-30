<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AvailableCPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('available_cp')->truncate();
        DB::insert('insert into available_cp (cp,active) values (?,?)', ['12345', true]);
        DB::insert('insert into available_cp (cp,active) values (?,?)', ['11111', true]);
        DB::insert('insert into available_cp (cp,active) values (?,?)', ['11850', true]);
        DB::insert('insert into available_cp (cp,active) values (?,?)', ['28350', true]);

        Schema::enableForeignKeyConstraints();
    }
}
