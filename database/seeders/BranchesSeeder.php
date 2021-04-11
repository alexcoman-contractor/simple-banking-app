<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::query()->create([
            'name' => 'First branch',
            'location_id' => 1
        ]);
        Branch::query()->create([
            'name' => 'Second branch',
            'location_id' => 1
        ]);
    }
}
