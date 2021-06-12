<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('platos')->truncate();
/*        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [1, '1. Seitán con verduras',  332.1, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [2, 'Rollitos de pepino y hummus',  384.5, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [3, 'Boloñesa de ternera con espaguetis de zanahoria',  335.0, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [4, 'Pimiento asado con pollo',  319.2, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [5, 'Fritata cuatro quesos',  320.1, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [6, 'Pechuga de pollo al horno con champiñones',  332.3, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [7, 'Seitán con verduras y teriyaki',  345.9, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [8, 'Judías blancas con tomate y cus cus',  335.1, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [9, 'Lentil Dahl y pan naan',  377.0, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [10, 'Menestra de verduras con soja', 368.6, 'macarrones.jpg', 'macarrones.jpg', 1, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [11, 'Buñuelos de calabacín con huevo y parmesano', 457.4, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [12, 'Falafel con boniato al horno', 431.8, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [13, 'Ensalada de alubias con arepas', 447.5, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [14, 'Garbanzos con Bacalao y espinacas', 444.8, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [15, 'Arroz con habichuelas', 447.5, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [16, 'Pasta con Almejas', 479.8, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [17, 'Pita proteica de verduras', 466.4, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [18, 'Curry de coliflor con garbanzos', 442.6, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [19, 'Vegan burrito', 431.5, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [20, 'Tortitas de legumbres (vegana)', 484.1, 'macarrones.jpg', 'macarrones.jpg', 2, 4, 1, 1, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [21, 'Seitán con verduras', 546.0, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [22, 'Rollitos de pepino y hummus', 606.3, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [23, 'Boloñesa de ternera con espaguetis de zanahoria', 593.0, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [24, 'Pimiento asado con pollo', 558.2, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [25, 'Fritata cuatro quesos', 631.7, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [26, 'Pechuga de pollo al horno con champiñones', 636.2, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [27, 'Seitán con verduras y teriyaki', 598.7, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [28, 'Judías blancas con tomate y cus cus', 528.6, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [29, 'Lentil Dahl y pan naan', 585.2, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [30, 'Menestra de verduras con soja', 589.1, 'macarrones.jpg', 'macarrones.jpg', 3, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [31, 'Buñuelos de calabacín con huevo y parmesano', 705.2, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [32, 'Falafel con boniato al horno', 775.8, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [33, 'Ensalada de alubias con arepas', 700.2, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [34, 'Garbanzos con Bacalao y espinacas', 701.2, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [35, 'Arroz con habichuelas', 786.9, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [36, 'Pasta con Almejas', 779.5, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [37, 'Pita proteica de verduras', 676.3, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [38, 'Curry de coliflor con garbanzos', 678.6, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?)', [39, 'Vegan burrito', 756.8, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);
        DB::insert('insert into platos (id,nombre,calorias,imagen_1,imagen_2,plato_codigo_id,precio,base_proteina_id,plato_peso_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [40, 'Tortitas de legumbres (vegana)', 796.9, 'macarrones.jpg', 'macarrones.jpg', 4, 4, 1, 2, 'Chicken Breast (41%), Hokkien Noodles (24%) (Wheat Flour, Water, Vegetable Oil, Noodle Improver, Salt, Emulsifying Salt (451, 450), Lye Water, Thickener (415), Preservative (202), Raising Agent (500, 450, 341)']);*/


        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [1, 'VE-1A-001', 1, 'Batata rellena de lentejas y espinacas',            384.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [2, 'PE-1A-001', 1, 'Salmón al horno con patata y verduras',             361.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [3, 'PE-1A-002', 1, 'Calabacín relleno de atún, pimientos y arroz',      387.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [4, 'VE-1A-002', 1, 'Berenjena rellena de garbanzos',                    379.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [5, 'VE-1A-003', 1, 'Chili vegano',                                      389.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [6, 'VE-1A-004', 1, 'Tortilla de boniato/batata con verduras asadas',    385.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [7, 'AV-1A-001', 1, 'Pollo al curry con verduras y arroz',               372.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [8, 'PE-1A-003', 1, 'Bacalao con tomate, pimientos y patata asada',      351.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [9, 'AV-1A-002', 1, 'Pollo al ajillo con verduras asadas',               342.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [10,'AV-1A-003', 1, 'Pasta integral con boloñesa de pollo',              372.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [11,'CA-1A-001', 1, 'Goulash de ternera',                                381.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [12,'VE-2A-005', 2, 'Espaguetis de Calabacín con boloñeas de lentejas',  476.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [13,'AV-2A-004', 2, 'Bol de quinoa con pollo y pimientos',               458.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [14,'VE-2A-006', 2, 'Garbanzos al curry con verduras',                   494.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [15,'AV-2A-005', 2, 'Pollo al chilindrón',                               432.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [16,'AV-2A-006', 2, 'Pollo guisado con tomate y naranja + patata asada', 423.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [17,'AV-2A-007', 2, 'Pollo con almendras y arroz integral',              476.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [18,'AV-2A-008', 2, 'Contramuslos asados con manzana',                   416.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [19,'CA-2A-002', 2, 'Lomo de cerdo en salsa de zanahoria',               472.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [20,'CA-2A-003', 2, 'Lasaña de calabacín con cerdo',                     430.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [21,'AV-2A-009', 2, 'Pollo en salsa de calabaza',                        496.0, 1, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [22,'VE-1B-001', 3, 'Batata rellena de lentejas y espinacas',            640.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [23,'PE-1B-001', 3, 'Salmón al horno con patata y verduras',             601.7, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [24,'PE-1B-002', 3, 'Calabacín relleno de atún, pimientos y arroz',      645.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [25,'VE-1B-002', 3, 'Berenjena rellena de garbanzos',                    631.7, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [26,'VE-1B-003', 3, 'Chili vegano',                                      648.3, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [27,'VE-1B-004', 3, 'Tortilla de boniato/batata con verduras asadas',    641.7, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [28,'AV-1B-001', 3, 'Pollo al curry con verduras y arroz',               620.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [29,'PE-1B-003', 3, 'Bacalao con tomate, pimientos y patata asada',      585.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [30,'AV-1B-002', 3, 'Pollo al ajillo con verduras asadas',               570.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [31,'AV-1B-003', 3, 'Pasta integral con boloñesa de pollo',              620.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [32,'CA-1B-001', 3, 'Goulash de ternera',                                635.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [33,'VE-2B-005', 4, 'Espaguetis de Calabacín con boloñeas de lentejas',  793.3, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [34,'AV-2B-004', 4, 'Bol de quinoa con pollo y pimientos',               763.3, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [35,'VE-2B-006', 4, 'Garbanzos al curry con verduras',                   823.3, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [36,'AV-2B-005', 4, 'Pollo al chilindrón',                               720.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [37,'AV-2B-006', 4, 'Pollo guisado con tomate y naranja + patata asada', 705.0, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [38,'AV-2B-007', 4, 'Pollo con almendras y arroz integral',              793.3, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [39,'AV-2B-008', 4, 'Contramuslos asados con manzana',                   693.3, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [40,'CA-2B-002', 4, 'Lomo de cerdo en salsa de zanahoria',               786.7, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [41,'CA-2B-003', 4, 'Lasaña de calabacín con cerdo',                     716.7, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);
        DB::insert('insert into platos (id,codigo,plato_codigo_id,nombre,calorias,plato_peso_id,imagen_1,imagen_2,precio,base_proteina_id,ingredientes) values (?,?,?,?,?,?,?,?,?,?,?)', [42,'AV-2B-009', 4, 'Pollo en salsa de calabaza',                        826.7, 2, 'macarrones.jpg', 'macarrones.jpg', 0, 1, '']);

        Schema::enableForeignKeyConstraints();
    }
}
