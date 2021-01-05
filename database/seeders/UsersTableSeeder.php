<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ADMINISTRADOR SISTEMA',
            'email' => 'admin@rampublicidad.com',
            'password' => Hash::make('admin'),
            'role_id' => '1',
        ]);
        User::create([
            'name' => 'ALESSANDRA GALDOS',
            'email' => 'alessandra.galdos@rampublicidad.com',
            'password' => Hash::make('alessandra.galdos'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'EMPLEADO',
            'email' => 'empleado@rampublicidad.com',
            'password' => Hash::make('empleado'),
            'role_id' => '3',
        ]);
        User::create([
            'name' => 'CLIENTE',
            'email' => 'cliente@rampublicidad.com',
            'password' => Hash::make('cliente'),
            'role_id' => '4',
        ]);
    }
}
