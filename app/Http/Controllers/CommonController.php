<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\City;
use App\Models\State;

class CommonController extends Controller
{
    public function delete_confirmation_modal(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
            'url' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return response()->json(array('response_type' => 0, 'response_error' => ErrorMessage::$errors));
        }

        $name = $request->get('name');
        $url = $request->get('url');

        $response_body =  view('partials._delete_confirmation_modal', [
            'name' => $name,
            'url' => $url,
        ]);

        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function delete_confirmation_big_modal(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
            'url' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return response()->json(array('response_type' => 0, 'response_error' => ErrorMessage::$errors));
        }

        $name = $request->get('name');
        $url = $request->get('url');

        $response_body =  view('partials._delete_confirmation_big_modal', [
            'name' => $name,
            'url' => $url,
        ]);

        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }


    public function getStates(Request $request)
    {
        $country = $request->input('country');
        $states = State::where('country_id', $country)->orderby('name')->get();
        // dd($states);
        return response()->json(['states' => $states]);
    }

    public function getCities(Request $request)
    {
        $state = $request->input('state');
        // $state_id = State::select('id')->where('name', $state)->first();
        $cities = City::where('state_id', $state)->get();
        return response()->json(['cities' => $cities]);
    }
}
