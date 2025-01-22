<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AddressDependencySeeder extends Seeder
{
    public function run()
    {
        Country::truncate();
        State::truncate();
        City::truncate();

        $sql = file_get_contents('database/seeders/crm_countries.sql');
        DB::unprepared($sql);

        $sql = file_get_contents('database/seeders/crm_states.sql');
        DB::unprepared($sql);

        // $path = database_path('seeders/crm_cities.sql');
        // $sql = File::get($path);

        // DB::unprepared($sql);
    }
}
