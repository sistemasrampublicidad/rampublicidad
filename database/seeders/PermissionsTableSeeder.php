<?php

namespace Database\Seeders;

use App\Models\Maintenance\PermissionsModel;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        PermissionsModel::create(['role_id' => '1', 'menu_id' => '1']);
        PermissionsModel::create(['role_id' => '1', 'menu_id' => '2']);
        PermissionsModel::create(['role_id' => '1', 'menu_id' => '3']);
        PermissionsModel::create(['role_id' => '1', 'menu_id' => '4']);
        PermissionsModel::create(['role_id' => '1', 'menu_id' => '5']);
        PermissionsModel::create(['role_id' => '1', 'menu_id' => '6']);
        PermissionsModel::create(['role_id' => '1', 'menu_id' => '7']);
        PermissionsModel::create(['role_id' => '1', 'menu_id' => '8']);

        PermissionsModel::create(['role_id' => '2', 'menu_id' => '1']);
        PermissionsModel::create(['role_id' => '2', 'menu_id' => '2']);
        PermissionsModel::create(['role_id' => '2', 'menu_id' => '3']);
        PermissionsModel::create(['role_id' => '2', 'menu_id' => '4']);
        PermissionsModel::create(['role_id' => '2', 'menu_id' => '5']);
        PermissionsModel::create(['role_id' => '2', 'menu_id' => '6']);
        PermissionsModel::create(['role_id' => '2', 'menu_id' => '7']);
        PermissionsModel::create(['role_id' => '2', 'menu_id' => '8']);

        PermissionsModel::create(['role_id' => '3', 'menu_id' => '1']);
        PermissionsModel::create(['role_id' => '3', 'menu_id' => '2']);
        PermissionsModel::create(['role_id' => '3', 'menu_id' => '3']);
        PermissionsModel::create(['role_id' => '3', 'menu_id' => '4']);
        PermissionsModel::create(['role_id' => '3', 'menu_id' => '5']);
        PermissionsModel::create(['role_id' => '3', 'menu_id' => '6']);
        PermissionsModel::create(['role_id' => '3', 'menu_id' => '7']);
        PermissionsModel::create(['role_id' => '3', 'menu_id' => '8']);

    }
}
