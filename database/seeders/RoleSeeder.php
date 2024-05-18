<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'ciudadano']);
        Role::create(['name' => 'recepcion']);
        Role::create(['name' => 'despacho']);
        Role::create(['name' => 'controlinterno']);
        Role::create(['name' => 'secretariadeplaneacion']);
        Role::create(['name' => 'secretariadegobierno']);
        Role::create(['name' => 'secretariadesalud']);
        Role::create(['name' => 'secretariadehacienda']);
        Role::create(['name' => 'secretariadesdrema']);
        Role::create(['name' => 'inspecciondepolicia']);
        Role::create(['name' => 'comisaria']);
    }
}

