<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([



        'nombre' => 'admin',
        'apellido_paterno' => 'admin',
        'apellido_materno' => 'admin',
        'email' => 'admin@admin.com',
        'telefono' => '0000000000',
        'usuario' => 'admin',
        'tipo_usuario' => 'admin',
        'password' => Hash::make('admin'),



        ]);
    }
}
