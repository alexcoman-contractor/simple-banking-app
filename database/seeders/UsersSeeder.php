<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123!')
        ]);

        $user->assignRole(Role::ADMIN);

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
    }
}
