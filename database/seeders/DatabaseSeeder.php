<?php

namespace Database\Seeders;

use App\Models\Organization;
use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\SolutionSeeder;
use Database\Seeders\TimezoneSeeder;
use Database\Seeders\Test\TestSeeder;
use Database\Seeders\ModuleListSeeder;
use Database\Seeders\ProjectTypeSeeder;
use Database\Seeders\ServiceTypeSeeder;
use Database\Seeders\TicketSourceSeeder;
use Database\Seeders\ContactSourceSeeder;
use Database\Seeders\EmailTemplateSeeder;
use Database\Seeders\SalesPipelineSeeder;
use Database\Seeders\StorageProviderSeeder;
use Database\Seeders\SupportPipelineSeeder;
use Database\Seeders\AddressDependencySeeder;
use Database\Seeders\SalesPipelineStageSeeder;
use Database\Seeders\SupportPipelineStageSeeder;

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
            TicketSourceSeeder::class,
            ProjectTypeSeeder::class,
            ServiceTypeSeeder::class
        ]);
        Organization::factory(5)->create();
    }
}
