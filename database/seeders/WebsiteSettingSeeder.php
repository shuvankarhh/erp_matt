<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\WebsiteSetting;

use Illuminate\Support\Facades\DB;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteSetting::create([
            'tenant_id' => '1' ,
            'company_name' => 'CRM',
            'company_address' => 'Dhaka, Bangladesh',
            'company_email' => 'support@example.com',
            'company_phone' => '+0123456789',
            'company_logo' => 'logo.png',
            'favicon' => 'favicon.ico',
            'seo_description' => 'CodeCloud CRM',
            'is_auto_report' => 1,
            'auto_report_scedule' => 1
        ]);

    }
    
}
