<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleListSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            ['name' => 'Custom Form', 'slug' => 'custom-form'],
            ['name' => 'Company', 'slug' => 'company-settings'],
            ['name' => 'Organization', 'slug' => 'organizations'],
            ['name' => 'Contact', 'slug' => 'contacts'],
            ['name' => 'Email Template', 'slug' => 'email-templates'],
            ['name' => 'Email', 'slug' => 'emails'],
            ['name' => 'Sale', 'slug' => 'sales'],
            ['name' => 'Support', 'slug' => 'supports'],
            ['name' => 'Ticket', 'slug' => 'tickets'],
            ['name' => 'Task', 'slug' => 'tasks'],
            ['name' => 'Solution', 'slug' => 'solutions'],
            ['name' => 'Tag', 'slug' => 'tags'],
            ['name' => 'Industry', 'slug' => 'industries'],
            ['name' => 'Website Settings', 'slug' => 'website-settings'],
        ];

        foreach ($modules as &$module) {
            $module['created_at'] = now();
            $module['updated_at'] = now();
        }

        DB::table('crm_module_lists')->insert($modules);
    }
}
