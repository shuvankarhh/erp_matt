<?php

namespace Database\Seeders;

use App\Models\SupportPipeline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportPipelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupportPipeline::create([
            'tenant_id' => '1' ,
            'name' => "Support Pipeline",
            'is_default' => 1,
        ]);
    }
}
