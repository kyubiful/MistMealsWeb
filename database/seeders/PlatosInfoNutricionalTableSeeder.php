<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlatosInfoNutricionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('platos_info_nutricional')->truncate();

        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [1,  1,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [2,  2,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [3,  3,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [4,  4,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [5,  5,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [6,  6,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [7,  7,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [8,  8,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [9,  9,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [10,  10,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [11,  11,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [12,  12,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [13,  13,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [14,  14,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [15,  15,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [16,  16,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [17,  17,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [18,  18,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [19,  19,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [20,  20,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [21,  21,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [22,  22,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [23,  23,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [24,  24,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [25,  25,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [26,  26,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [27,  27,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [28,  28,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [29,  29,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [30,  30,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [31,  31,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [32,  32,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [33,  33,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [34,  34,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [35,  35,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [36,  36,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [37,  37,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [38,  38,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [39,  39,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [40,  40,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [41,  41,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [42,  42,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [43,  43,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [44,  44,  0, 0, 0, 0, 0 , 0 , 0, 0, 0]);

        Schema::enableForeignKeyConstraints();
    }
}
