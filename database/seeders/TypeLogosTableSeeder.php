<?php

namespace Database\Seeders;

use App\Models\administrator\TypesLogos;
use Illuminate\Database\Seeder;

class TypeLogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypesLogos::create(['name' => 'Logos']);
        TypesLogos::create(['name' => 'Manual de Marca']);
    }
}
