<?php

namespace Tests\Feature;

use App\Models\Branch;
use App\Models\Location;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_see_reports()
    {
        $this
            ->createAdmin()
            ->login();

        $location = Location::query()->create(['name' => 'Location']);

        Branch::query()->create([
            'name' => 'First branch',
            'location_id' => $location->id
        ]);

        Branch::query()->create([
            'name' => 'Second branch',
            'location_id' => $location->id
        ]);

        User::query()->create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123!'),
            'branch_id' => 1,
            'balance' => 100000
        ]);

        User::query()->create([
            'name' => 'Second Test',
            'email' => 'stest@test.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123!'),
            'branch_id' => 1,
            'balance' => 100000
        ]);

        $response = $this->get(route('report.show'));

        $response->assertStatus(200);
        $response->assertSee('First branch');
        $response->assertSee('Second branch');
    }
}
