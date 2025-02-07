<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Database\Seeders\Test\TestSeeder;
use Database\Seeders\ContactSourceSeeder;
use Database\Seeders\StorageProviderSeeder;
use Database\Seeders\AddressDependencySeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Organization::truncate();

        $this->call([
            TestSeeder::class,
            CurrencySeeder::class,
            TeamSeeder::class,
            SupportPipelineSeeder::class,
            SupportPipelineStageSeeder::class,
            ContactSourceSeeder::class,
            TagSeeder::class,
            AddressDependencySeeder::class,
            StorageProviderSeeder::class,
            TimezoneSeeder::class,
            EmailTemplateSeeder::class,
            SolutionSeeder::class,
            ModuleListSeeder::class,
            SalesPipelineSeeder::class,
            SalesPipelineStageSeeder::class,
            TicketSourceSeeder::class
        ]);
        Organization::factory(5)->create();
    }
}
