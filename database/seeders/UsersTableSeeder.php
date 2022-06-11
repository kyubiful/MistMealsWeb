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
        DB::insert('insert into users (id,name,email,password,sexo_id,role_id) values (?,?,?,?,?,?)', [1, 'Sergio', 'user@gmail.com', 'passwordEncrypted', 1, 1]);
      
        Schema::enableForeignKeyConstraints();
    }
}
