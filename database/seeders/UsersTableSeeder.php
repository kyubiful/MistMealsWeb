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
        DB::insert('insert into users (id,name,email,password,sexo_id,role_id) values (?,?,?,?,?,?)', [1, 'Sergio Admin', 'ser.zabala@mistmeals.com', '$2y$10$UdTfs2oxfyMyGGDLL0UuZOT9Ri5JR1qbTPyZp.PtmkGBb0iPxWhke', 1, 1]);
        DB::insert('insert into users (id,name,email,password,sexo_id,role_id) values (?,?,?,?,?,?)', [2, 'Juan José', 'direccion@mistmeals.com', '$2y$10$ByKeM65xH.MIul/OiMWHSOb0vmj/znDfA7vPp7JJWzOtbMK5rOBAW', 1, 1]);
        DB::insert('insert into users (id,name,email,password,sexo_id,role_id) values (?,?,?,?,?,?)', [3, 'Iván', 'ivanmarin@mistmeals.com', '$2y$10$UdTfs2oxfyMyGGDLL0UuZOT9Ri5JR1qbTPyZp.PtmkGBb0iPxWhke', 1, 1]);
        DB::insert('insert into users (id,name,email,password,sexo_id,role_id) values (?,?,?,?,?,?)', [4, 'Jorge', 'tuchef@mistmeals.com', '$2y$10$E8yjaQcyQmsQCWAwdZeMUO/3i7WQVGmjwz3ZsWaGsxsqKJvHZmIt.', 1, 1]);

        Schema::enableForeignKeyConstraints();
    }
}
