<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['id' => Role::ADMIN, 'name' => 'Admin']);
        Role::create(['id' => Role::CUSTOMER, 'name' => 'Customer']);
    }
}
