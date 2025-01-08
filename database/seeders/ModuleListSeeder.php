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
            ['name' => 'Company', 'slug' => 'company'],
            ['name' => 'Organization', 'slug' => 'organization'],
            ['name' => 'Contact', 'slug' => 'contact'],
            ['name' => 'Email Template', 'slug' => 'email-template'],
            ['name' => 'Email', 'slug' => 'email'],
            ['name' => 'Sale', 'slug' => 'sale'],
            ['name' => 'Support', 'slug' => 'support'],
            ['name' => 'Ticket', 'slug' => 'ticket'],
            ['name' => 'Task', 'slug' => 'task'],
            ['name' => 'Solution', 'slug' => 'solution'],
            ['name' => 'Tag', 'slug' => 'tag'],
            ['name' => 'Industry', 'slug' => 'industry'],
            ['name' => 'Website Settings', 'slug' => 'website-settings'],
        ];

        foreach ($modules as &$module) {
            $module['created_at'] = now();
            $module['updated_at'] = now();
        }

        DB::table('crm_module_lists')->insert($modules);
    }
}
