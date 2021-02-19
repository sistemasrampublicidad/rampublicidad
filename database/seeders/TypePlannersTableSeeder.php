<?php

namespace Database\Seeders;

use App\Models\administrator\TypesPlanners;
use Illuminate\Database\Seeder;

class TypePlannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypesPlanners::create(['name' => 'Calendario']);
        TypesPlanners::create(['name' => 'Pauta publicitaria']);
        TypesPlanners::create(['name' => 'Posts']);
    }
}
