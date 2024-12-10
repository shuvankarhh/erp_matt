<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Regular',
            'type' => 1,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Special',
            'type' => 1,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Important',
            'type' => 1,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Vip',
            'type' => 1,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Vvip',
            'type' => 1,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Idle',
            'type' => 1,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Regular',
            'type' => 2,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Special',
            'type' => 2,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Important',
            'type' => 2,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Vip',
            'type' => 2,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name' => 'Vvip',
            'type' => 2,
        ]);
        Tag::create([
            'tenant_id' => '1' ,
            'name'      => 'Idle',
            'type'      => 2,
        ]);
    }
}
