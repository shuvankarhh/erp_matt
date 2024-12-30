<?php

namespace Database\Seeders\Test;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserDependencySeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        $now = now();

        $user = User::create([
            'tenant_id' => '1',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            // 'password' => 'Matt@-*/Matt',
            'password' => '1234',
            'user_role_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
