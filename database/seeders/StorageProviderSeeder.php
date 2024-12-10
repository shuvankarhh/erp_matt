<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\StorageProvider;

class StorageProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StorageProvider::truncate();

        StorageProvider::create([
            'tenant_id' => '1' ,
            'name' => 'Local Storage',
            'alias' => 'local',
            'logo_path' => 'logo.png',
            'credentials' => json_encode([]),
            'description' => null,
            'acting_status' => 1,
        ]);

    }
}
