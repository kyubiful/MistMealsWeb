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
        /*DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [1, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 1]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [2, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 2]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [3, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 3]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [4, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 4]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [5, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 5]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [6, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 6]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [7, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 7]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [8, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 8]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [9, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 9]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [10, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 10]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [11, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 11]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [12, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 12]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [13, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 13]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [14, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 14]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [15, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 15]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [16, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 16]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [17, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 17]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [18, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 18]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [19, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 19]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [20, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 20]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [21, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 21]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [22, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 22]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [23, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 23]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [24, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 24]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [25, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 25]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [26, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 26]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [27, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 27]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [28, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 28]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [29, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 29]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [30, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 30]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [31, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 31]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [32, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 32]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [33, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 33]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [34, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 34]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [35, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 35]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [36, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 36]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [37, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 37]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [38, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 38]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [39, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 39]);
        DB::insert('insert into platos_info_nutricional (id,energia,calorias,proteinas,grasas,saturadas,carbohidratos,azucar,fibra,sodio,plato_id) values (?,?,?,?,?,?,?,?,?,?,?)', [40, 562.5, 134.2, 11.7, 2.7, 0.5, 15.3, 4.6, 0.7, 311.1, 40]);*/

        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [1,  1,  0, 384.0, 24.2, 0, 47.0 , 6.1 , 22.7, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [2,  2,  0, 361.0, 27.5, 0, 18.8 , 18.8 , 4.3, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [3,  3,  0, 387.0, 34.9, 0, 42.3 , 7.7 , 4.3, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [4,  4,  0, 379.0, 21.8, 0, 48.0 , 11.1 , 0.5, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [5,  5,  0, 389.0, 27.1, 0, 44.0 , 5.4 , 27.9, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [6,  6,  0, 385.0, 21.5, 0, 23.1 , 21.9 , 5.5, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [7,  7,  0, 372.0, 29.3, 0, 30.4 , 12.9 , 8.3, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [8,  8,  0, 351.0, 32.9, 0, 37.1 , 6.3 , 7.9, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [9,  9,  0, 342.0, 43.3, 0, 8.2, 14.6 , 2.5, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [10, 10, 0, 372.0, 34.4, 0, 35.7 , 9.0 , 5.7, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [11, 11, 0, 381.0, 33.0, 0, 41.2 , 7.8 , 8.1, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [12, 12, 0, 476.0, 31.2, 0, 66.7 , 6.2 , 14.5, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [13, 13, 0, 458.0, 43.4, 0, 39.0 , 12.8 , 6.7, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [14, 14, 0, 494.0, 24.1, 0, 66.8 , 11.2 , 15.6, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [15, 15, 0, 432.0, 40.0, 0, 42.9 , 9.5 , 8.0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [16, 16, 0, 423.0, 47.8, 0, 20.7 , 14.7 , 8.0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [17, 17, 0, 476.0, 45.1, 0, 31.8 , 17.2 , 7.3, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [18, 18, 0, 416.0, 31.9, 0, 31.6 , 17.0 , 5.0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [19, 19, 0, 472.0, 29.0, 0, 39.9 , 20.1 , 7.8, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [20, 20, 0, 430.0, 24.3, 0, 17.7 , 28.2 , 4.7, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [21, 21, 0, 496.0, 37.0, 0, 45.4 , 16.9 , 8.0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [22, 22, 0, 640.0, 40.3, 0, 78.3 , 10.2 , 37.8, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [23, 23, 0, 601.7, 45.8, 0, 31.3 , 31.3 , 7.2, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [24, 24, 0, 645.0, 58.2, 0, 70.5 , 12.8 , 7.2, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [25, 25, 0, 631.7, 36.3, 0, 80.0 , 18.5 , 0.8, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [26, 26, 0, 648.3, 45.2, 0, 73.3 , 9.0 , 46.5, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [27, 27, 0, 641.7, 35.8, 0, 38.5 , 36.5 , 9.2, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [28, 28, 0, 620.0, 48.8, 0, 50.7 , 21.5 , 13.8, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [29, 29, 0, 585.0, 54.8, 0, 61.8 , 10.5 , 13.2, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [30, 30, 0, 570.0, 72.2, 0, 13.7 , 24.3 , 4.2, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [31, 31, 0, 620.0, 57.3, 0, 59.5 , 15.0 , 9.5, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [32, 32, 0, 635.0, 55.0, 0, 68.7 , 13.0 , 13.5, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [33, 33, 0, 793.3, 52.0, 0, 111.2 , 10.3 , 24.2, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [34, 34, 0, 763.3, 72.3, 0, 65.0 , 21.3 , 11.2, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [35, 35, 0, 823.3, 40.2, 0, 111.3 ,  18.7 , 26.0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [36, 36, 0, 720.0, 66.7, 0, 71.5 , 15.8 , 13.3, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [37, 37, 0, 705.0, 79.7, 0, 34.5 , 24.5 , 13.3, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [38, 38, 0, 793.3, 75.2, 0, 53.0 , 28.7 , 12.2, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [39, 39, 0, 693.3, 53.2, 0, 52.7 , 28.3 , 8.3, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [40, 40, 0, 786.7, 48.3, 0, 66.5 , 33.5 , 13.0, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [41, 41, 0, 716.7, 40.5, 0, 29.5 , 47.0 , 7.8, 0, 0]);
        DB::insert('insert into platos_info_nutricional (id,plato_id,energia,calorias,proteinas,saturadas,carbohidratos,grasas,fibra,azucar,sodio) values (?,?,?,?,?,?,?,?,?,?,?)', [42, 42, 0, 826.7, 61.7, 0, 75.7 , 28.2 , 13.3, 0, 0]);


        Schema::enableForeignKeyConstraints();
    }
}
