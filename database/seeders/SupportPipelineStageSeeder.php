<?php

namespace Database\Seeders;

use App\Models\SupportPipeline;
use Illuminate\Database\Seeder;
use App\Models\SupportPipelineStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupportPipelineStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $stage = new SupportPipelineStage;
        // $pipeline = $stage->pipeline;
        $pipeline = SupportPipeline::first();

        $stages = [
            ['tenant_id' => '1' ,'name' => 'New', 'resolving_status' => 1],
            ['tenant_id' => '1' ,'name' => 'Contacted', 'resolving_status' => 1],
            ['tenant_id' => '1' ,'name' => 'Closed', 'resolving_status' => 2],
        ];

        foreach ($stages as $stage) {
            $stage['pipeline_id'] = $pipeline->id;
            SupportPipelineStage::create($stage);
        }
    }
}
