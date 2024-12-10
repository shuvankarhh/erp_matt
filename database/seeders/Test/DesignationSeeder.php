<?php

namespace Database\Seeders\Test;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Designation;


class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::create([
            'tenant_id' => '1' ,
            'name' => "Office Manager"
        ]);
        Designation::create([
            'tenant_id' => '1' ,
            'name' => "Analyst"
        ]);
        Designation::create([
            'tenant_id' => '1' ,
            'name' => "Technical Support"
        ]);
        Designation::create([
            'tenant_id' => '1' ,
            'name' => "Project Manager"
        ]);
    }
}
