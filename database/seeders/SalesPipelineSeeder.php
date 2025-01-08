<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesPipelineSeeder extends Seeder
{
    public function run(): void
    {
        $sales_pipelines = [
            ['name' => 'Sales Pipeline', 'is_default' => 1],
            ['name' => 'Demo 2', 'is_default' => 0],
            ['name' => 'Demo 3', 'is_default' => 0],
        ];

        foreach ($sales_pipelines as &$sales_pipeline) {
            $sales_pipeline['tenant_id'] = 1;
            $sales_pipeline['created_at'] = now();
            $sales_pipeline['updated_at'] = now();
            $sales_pipeline['deleted_at'] = null;

            DB::table('crm_sales_pipelines')->insert($sales_pipeline);
        }
    }
}
