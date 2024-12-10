<?php

namespace Database\Seeders\Test;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Email;
use App\Models\UserEmail;
use App\Models\Phone;
use App\Models\UserPhone;

class UserDependencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        $now = now();

        $user = User::create([
            'tenant_id' => '1',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '123456',
            'user_role_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        
        // phones without user end
    }
}
