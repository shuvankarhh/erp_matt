<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            'Marketing',
            'Customer Support',
            'Sales',
            'Software',
            'Others',
        ];
        
        $tenant_id = 1; // Assuming the tenant ID is always 1 for all teams.

        foreach ($teams as $team) {
            Team::create([
                'tenant_id' => $tenant_id, // Adjust the column name to match your database schema.
                'name' => $team,
            ]);
        }
    }
}
