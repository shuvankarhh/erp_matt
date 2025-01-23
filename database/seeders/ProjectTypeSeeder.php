<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypeSeeder extends Seeder
{
    public function run(): void
    {
        $project_types = [
            ['name' => 'Software Development'],
            ['name' => 'Construction'],
            ['name' => 'Marketing Campaign'],
            ['name' => 'E-commerce'],
            ['name' => 'Healthcare'],
            ['name' => 'Education'],
        ];

        foreach ($project_types as &$project_type) {
            $project_type['tenant_id'] = 1;
            $project_type['created_at'] = now();
            $project_type['updated_at'] = now();
            $project_type['deleted_at'] = null;

            DB::table('project_types')->insert($project_type);
        }
    }
}
