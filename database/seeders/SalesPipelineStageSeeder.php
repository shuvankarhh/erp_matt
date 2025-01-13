<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesPipelineStageSeeder extends Seeder
{
    public function run(): void
    {
        $sales_pipeline_stages = [
            ['pipeline_id' => 1, 'name' => 'Stage For Pipeline 1-1', 'probability' => 50],
            ['pipeline_id' => 1, 'name' => 'Stage For Pipeline 1-2', 'probability' => 50],
            ['pipeline_id' => 1, 'name' => 'Stage For Pipeline 1-3', 'probability' => 50],
            ['pipeline_id' => 2, 'name' => 'Stage For Pipeline 2-1', 'probability' => 50],
            ['pipeline_id' => 2, 'name' => 'Stage For Pipeline 2-2', 'probability' => 50],
            ['pipeline_id' => 2, 'name' => 'Stage For Pipeline 2-3', 'probability' => 50],
            ['pipeline_id' => 3, 'name' => 'Stage For Pipeline 3-1', 'probability' => 50],
            ['pipeline_id' => 3, 'name' => 'Stage For Pipeline 3-2', 'probability' => 50],
            ['pipeline_id' => 3, 'name' => 'Stage For Pipeline 3-3', 'probability' => 50],
        ];

        foreach ($sales_pipeline_stages as &$sales_pipeline_stage) {
            $sales_pipeline_stage['tenant_id'] = 1;
            $sales_pipeline_stage['created_at'] = now();
            $sales_pipeline_stage['updated_at'] = now();
            $sales_pipeline_stage['deleted_at'] = null;

            DB::table('crm_sales_pipeline_stages')->insert($sales_pipeline_stage);
        }
    }
}
