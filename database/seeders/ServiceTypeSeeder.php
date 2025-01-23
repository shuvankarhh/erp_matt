<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypeSeeder extends Seeder
{
    public function run(): void
    {
        $service_types = [
            // Software Development
            ['project_type_id' => 1, 'name' => 'Backend Development'],
            ['project_type_id' => 1, 'name' => 'Frontend Development'],
            ['project_type_id' => 1, 'name' => 'QA Testing'],

            // Construction
            ['project_type_id' => 2, 'name' => 'Architectural Design'],
            ['project_type_id' => 2, 'name' => 'Civil Engineering'],
            ['project_type_id' => 2, 'name' => 'Surveying'],

            // Marketing Campaign
            ['project_type_id' => 3, 'name' => 'Content Creation'],
            ['project_type_id' => 3, 'name' => 'SEO Optimization'],
            ['project_type_id' => 3, 'name' => 'Social Media Management'],

            // E-commerce
            ['project_type_id' => 4, 'name' => 'Product Listing'],
            ['project_type_id' => 4, 'name' => 'Payment Gateway Integration'],
            ['project_type_id' => 4, 'name' => 'Customer Support'],

            // Healthcare
            ['project_type_id' => 5, 'name' => 'Patient Management Systems'],
            ['project_type_id' => 5, 'name' => 'Lab Integration'],
            ['project_type_id' => 5, 'name' => 'Telemedicine'],

            // Education
            ['project_type_id' => 6, 'name' => 'Online Learning Platforms'],
            ['project_type_id' => 6, 'name' => 'Content Management'],
            ['project_type_id' => 6, 'name' => 'Course Development'],
        ];

        foreach ($service_types as &$service_type) {
            $service_type['tenant_id'] = 1;
            $service_type['created_at'] = now();
            $service_type['updated_at'] = now();
            $service_type['deleted_at'] = null;

            DB::table('service_types')->insert($service_type);
        }
    }
}
