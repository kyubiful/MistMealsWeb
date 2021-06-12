<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IngredientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('ingredientes')->truncate();
        DB::insert('insert into ingredientes (id,nombre,peso,hidratos,proteinas,grasas,calorias,plato_id) values (?,?,?,?,?,?,?,?)', [1, 'Brócoli', 380, 40, 40, 20, 700, 1]);

        Schema::enableForeignKeyConstraints();
    }
}
