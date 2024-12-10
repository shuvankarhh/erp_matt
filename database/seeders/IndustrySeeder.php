<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Industry::create([
            'tenant_id' => '1' ,
            'name' => "Accounting"
        ]);
        Industry::create([
            'tenant_id' => '1' ,
            'name' => "Airlines "
        ]);
        Industry::create([
            'tenant_id' => '1' ,
            'name' => "Cloud Code Technology"
        ]);
        Industry::create([
            'tenant_id' => '1' ,
            'name' => "Modhumoti"
        ]);
        Industry::create([
            'tenant_id' => '1' ,
            'name' => "Jamdhani Hut"
        ]);
    }
}
