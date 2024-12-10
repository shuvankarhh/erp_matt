<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class AddressDependencySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Country::truncate();
		State::truncate();
		City::truncate();

		$sql = file_get_contents('database/seeders/crm_countries.sql');
		DB::unprepared($sql);

		$sql = file_get_contents('database/seeders/crm_states.sql');
		DB::unprepared($sql);

		// $sql = file_get_contents('database/seeders/crm_cities.sql');
		// DB::unprepared($sql);
	}
}
