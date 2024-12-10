<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Tenant;

use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
            'name' => 'Acme Corp',
            'domain' => 'acme.tenant.com',
            'plan' => 'pro',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
    
}
