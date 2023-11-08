<?php

namespace Database\Seeders;


use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class OpcionSeeder extends Seeder

{

    public function run()

    {

        $faker =Faker::create();



        for ($i = 0; $i < 45; $i++) {

            $dependenciaId = rand(1, 9);

            $nombres = $faker->name();



            DB::table('opciones')->insert([

                'dependencia_id' => $dependenciaId,

                'nombres' => $nombres,

            ]);

        }

    }

}


