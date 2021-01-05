<?php

namespace Database\Seeders;

use App\Models\Maintenance\MenusModel;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenusModel::create(['name' => 'Crear Logo', 'link' => 'logo.create']);
        MenusModel::create(['name' => 'Modificar Logo', 'link' => 'logo.update']);
        MenusModel::create(['name' => 'Leer Logo', 'link' => 'logo.index']);
        MenusModel::create(['name' => 'Eliminar Logo', 'link' => 'logo.delete']);

        MenusModel::create(['name' => 'Crear Planners', 'link' => 'planners.create']);
        MenusModel::create(['name' => 'Modificar Planners', 'link' => 'planners.update']);
        MenusModel::create(['name' => 'Leer Planners', 'link' => 'planners.index']);
        MenusModel::create(['name' => 'Eliminar Planners', 'link' => 'planners.delete']);

    }
}
