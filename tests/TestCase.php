<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var User
     */
    private User $user;

    /**
     * @return $this
     */
    public function createAdmin(): TestCase
    {
        Role::create(['name' => 'Admin']);

        $this->user = User::factory()->create();
        $this->user->assignRole('Admin');

        return $this;
    }

    /**
     * @return $this
     */
    public function login(): TestCase
    {
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        return $this;
    }
}
