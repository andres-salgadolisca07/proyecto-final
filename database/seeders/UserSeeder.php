<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id'=>1,'name'=>'andres salgado','tipo_iden'=>'cedula','iden'=>'1234567890','email'=>'andres@gmail.com','tel'=>'3105748351','direccion'=>'donde mi abuelita','password'=>'123456789']

        ]);
    }
}
