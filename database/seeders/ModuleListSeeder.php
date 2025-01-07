<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleListSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('crm_module_lists')->insert([
            ['name' => 'Custom Form', 'slug' => 'custom-form', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Company', 'slug' => 'company', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Organization', 'slug' => 'organization', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Contact', 'slug' => 'contact', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Email Template', 'slug' => 'email-template', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Email', 'slug' => 'email', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sale', 'slug' => 'sale', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Support', 'slug' => 'support', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ticket', 'slug' => 'ticket', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Task', 'slug' => 'task', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Solution', 'slug' => 'solution', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tag', 'slug' => 'tag', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Industry', 'slug' => 'industry', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Website Setting', 'slug' => 'website-setting', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
