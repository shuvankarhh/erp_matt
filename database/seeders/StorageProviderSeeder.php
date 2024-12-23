<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\StorageProvider;

class StorageProviderSeeder extends Seeder
{
    public function run()
    {
        StorageProvider::truncate();

        StorageProvider::create([
            'tenant_id' => '1',
            'name' => 'Local Storage',
            'alias' => 'local',
            'logo_path' => 'logo.png',
            // 'credentials' => json_encode([]),
            'credentials' => 'Credentials Here',
            'description' => 'Description Here',
            'acting_status' => 1,
        ]);
    }
}
