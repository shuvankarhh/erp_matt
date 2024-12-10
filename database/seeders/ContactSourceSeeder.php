<?php

namespace Database\Seeders;

use App\Models\ContactSource;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Organic Search"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Paid Search"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Email  Marketing",
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Advertisement"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Employee Referral"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "External Referral"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "In-Store"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "On-Site"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Print"
        ]);

        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Organic Social"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Paid Social"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Trade Show"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Word of Mouth"
        ]);
        ContactSource::create([
            'tenant_id' => '1' ,
            'name' => "Other"
        ]);
    }
}
