<?php

namespace Tests\Feature;

use App\Models\Location;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BranchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_branch_can_be_created()
    {
        $this
            ->createAdmin()
            ->login();

        $location = Location::query()->create([
            'name' => 'Location'
        ]);

        $response = $this->post(route('branch.store'), [
            'name' => 'Test Branch',
            'location' => $location->id,
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
