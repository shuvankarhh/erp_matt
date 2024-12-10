<?php

namespace Database\Seeders\Test;

use Database\Seeders\IndustrySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserRoleSeeder;
use Database\Seeders\WebsiteSettingSeeder;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserRoleSeeder::class,
            WebsiteSettingSeeder::class,
            UserDependencySeeder::class,
            DesignationSeeder::class,
            IndustrySeeder::class,
        ]);
    }
}
