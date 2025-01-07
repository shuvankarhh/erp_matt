<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SolutionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('crm_solutions')->insert([
            'tenant_id' => '1',
            'name' => 'iPhone 16 Pro Max',
            'sku' => 'IPH16PM-256GB',
            'description' => 'The latest iPhone with cutting-edge technology, 256GB storage, A18 Bionic chip.',
            'type' => 1,
            'storage_provider_id' => null,
            'is_private_image' => false,
            'image_path' => 'images/iPhone-16-Pro-Max.jpg',
            'image_url' => '/storage/images/eTscPX5QdzlwCA3wsw0aJkGSe',
            'original_image_name' => 'iPhone-16-Pro-Max.jpg',
            'solution_url' => 'https://www.applegadgetsbd.com/product/iphone-16-pro-max',
            'currency_id' => 1,
            'price' => 1400.00,
            'cost' => 1000.00,
            'tax_percentage' => 10.00,
            'tax_amount' => 140.00,
            'final_price' => 1540.00,
            'subscription_interval' => null,
            'subscription_term' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
