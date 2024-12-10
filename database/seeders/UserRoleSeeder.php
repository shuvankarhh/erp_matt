<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'tenant_id' => '1' ,
            'name' => 'App Admin' // id = 1
        ]);
        UserRole::create([
            'tenant_id' => '1' ,
            'name' => 'Customer', // id = 2
        ]);
        UserRole::create([
            'tenant_id' => '1' ,
            'name' => 'Staff', // id = 3
        ]);

    }
}
