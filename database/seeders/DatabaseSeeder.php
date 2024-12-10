<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Organization;
use Database\Seeders\ContactSourceSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\StorageProviderSeeder;
use Database\Seeders\AddressDependencySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Organization::truncate();

        $this->call([
            Test\TestSeeder::class,
            CurrencySeeder::class,
            TeamSeeder::class,
            SupportPipelineSeeder::class,
            SupportPipelineStageSeeder::class,
            ContactSourceSeeder::class,
            TagSeeder::class,
            AddressDependencySeeder::class,
            StorageProviderSeeder::class,
            TimezoneSeeder::class,
        ]);
        Organization::factory(10)->create();
    }
}


