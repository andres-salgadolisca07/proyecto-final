<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('dependencias')->insert([
        ['id'=>1,'nombres'=>'Despacho'],
        ['id'=>2,'nombres'=>'Control Interno'],
        ['id'=>3,'nombres'=>'Secretaria DePlaneacion'],
        ['id'=>4,'nombres'=>'Secretaria De Gobierno'],
        ['id'=>5,'nombres'=>'Secretaria De Salud'],
        ['id'=>6,'nombres'=>'Secretaria De Hacienda'],
        ['id'=>7,'nombres'=>'Secretaria De Sdrema'],
        ['id'=>8,'nombres'=>'Inspeccion De Policia'],
        ['id'=>9,'nombres'=>'Comisaria'],
    ]);
    }
}
