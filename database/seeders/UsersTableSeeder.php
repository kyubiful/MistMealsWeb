<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users')->truncate();
        DB::insert('insert into users (id,name,email,password,sexo_id,role_id) values (?,?,?,?,?,?)', [1, 'Josué Admin', 'admin@miotek.es', '$2y$10$ZkchI/spnVo6d1S9emGeOuoYYwRSpJPOzNvox9VXCUPqDfhgaj6jO', 1, 1]);
        DB::insert('insert into users (id,name,email,password,sexo_id,role_id,altura,peso,edad,objetivo_id,nivel_ejercicio_id) values (?,?,?,?,?,?,?,?,?,?,?)', [2, 'Josué User', 'user@miotek.es', '$2y$10$ZkchI/spnVo6d1S9emGeOuoYYwRSpJPOzNvox9VXCUPqDfhgaj6jO', 2, 2, 183, 73, 31, 3, 4]);

        Schema::enableForeignKeyConstraints();
    }
}
