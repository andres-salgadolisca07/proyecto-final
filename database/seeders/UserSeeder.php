<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            ['name' => 'User Despacho', 'tipo_iden' => 'cedula', 'iden' => '1234567891', 'email' => 'despacho@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748351', 'direccion' => 'direccion despacho', 'password' => bcrypt('alcaldia123'), 'role' => 'despacho'],
            ['name' => 'User Control Interno', 'tipo_iden' => 'cedula', 'iden' => '1234567892', 'email' => 'controlinterno@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748352', 'direccion' => 'direccion control interno', 'password' => bcrypt('alcaldia123'), 'role' => 'controlinterno'],
            ['name' => 'User Secretaria DePlaneacion', 'tipo_iden' => 'cedula', 'iden' => '1234567893', 'email' => 'planeacion@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748353', 'direccion' => 'direccion planeacion', 'password' => bcrypt('alcaldia123'), 'role' => 'secretariadeplaneacion'],
            ['name' => 'User Secretaria De Gobierno', 'tipo_iden' => 'cedula', 'iden' => '1234567894', 'email' => 'gobierno@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748354', 'direccion' => 'direccion gobierno', 'password' => bcrypt('alcaldia123'), 'role' => 'secretariadegobierno'],
            ['name' => 'User Secretaria De Salud', 'tipo_iden' => 'cedula', 'iden' => '1234567895', 'email' => 'salud@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748355', 'direccion' => 'direccion salud', 'password' => bcrypt('alcaldia123'), 'role' => 'secretariadesalud'],
            ['name' => 'User Secretaria De Hacienda', 'tipo_iden' => 'cedula', 'iden' => '1234567896', 'email' => 'hacienda@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748356', 'direccion' => 'direccion hacienda', 'password' => bcrypt('alcaldia123'), 'role' => 'secretariadehacienda'],
            ['name' => 'User Secretaria De Sdrema', 'tipo_iden' => 'cedula', 'iden' => '1234567897', 'email' => 'sdrema@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748357', 'direccion' => 'direccion sdrema', 'password' => bcrypt('alcaldia123'), 'role' => 'secretariadesdrema'],
            ['name' => 'User Inspeccion De Policia', 'tipo_iden' => 'cedula', 'iden' => '1234567898', 'email' => 'policia@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748358', 'direccion' => 'direccion policia', 'password' => bcrypt('alcaldia123'), 'role' => 'inspecciondepolicia'],
            ['name' => 'User Comisaria', 'tipo_iden' => 'cedula', 'iden' => '1234567899', 'email' => 'comisaria@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748359', 'direccion' => 'direccion comisaria', 'password' => bcrypt('alcaldia123'), 'role' => 'comisaria'],
            ['name' => 'User Recepcion', 'tipo_iden' => 'cedula', 'iden' => '1234567890', 'email' => 'recepcion@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748350', 'direccion' => 'direccion recepcion', 'password' => bcrypt('alcaldia123'), 'role' => 'recepcion'],
            ['name' => 'User Ciudadano', 'tipo_iden' => 'cedula', 'iden' => '1234567800', 'email' => 'ciudadano@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748300', 'direccion' => 'direccion ciudadano', 'password' => bcrypt('alcaldia123'), 'role' => 'ciudadano'],
            ['name' => 'User Admin', 'tipo_iden' => 'cedula', 'iden' => '1234567801', 'email' => 'admin@sanantoniodeltequendama-cundinamarca.gov.co', 'tel' => '3105748301', 'direccion' => 'direccion admin', 'password' => bcrypt('alcaldia123'), 'role' => 'admin'],
        ];
    
        foreach ($usuarios as $usuarioData) {
            // Eliminar 'role' del array de datos del usuario
            $rol = $usuarioData['role'] ?? null;
            unset($usuarioData['role']);
        
            // Crear usuario
            $usuario = User::create($usuarioData);
        
            // Asignar rol si está presente
            if ($rol) {
                $usuario->assignRole($rol);
            }
        }
        
    }
}
