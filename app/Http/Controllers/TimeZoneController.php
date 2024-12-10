<?php

namespace App\Http\Controllers;

use App\Models\Timezone;
use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class TimeZoneController extends Controller
{
    public function __invoke(Request $request)
    {
        $validation_rules = [
            'timezone' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return response()->json(array('response_type' => 0, 'response_error' => ErrorMessage::$errors));
        }

        $refresh_page = 0;

        if (!session()->has('timezone')) {
            $refresh_page = 1;
        }

        session(['timezone' => $request->get('timezone')]);

        return response()->json(array('response_type' => 1, 'refresh_page' => $refresh_page));
    }

    public function searchTimezone(Request $request)
    {
        $input = $request->input('term');

        if ($input != null) {
            $results = [];

            $queries = Timezone::where('name', 'LIKE', '%' . $input . '%')
                ->limit(2)
                ->get();

            foreach ($queries as $query) {
                $results[] = ['id' => $query->id, 'value' => $query->name];
            }

            return response()->json($results);
        }
    }
}
