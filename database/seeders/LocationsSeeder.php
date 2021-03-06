<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Location 1',
            'Location 2'
        ];

        foreach ($locations as $location) {
            Location::query()->create(['name' => $location]);
        }
    }
}
