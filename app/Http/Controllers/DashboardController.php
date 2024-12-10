<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\Bidding;
use App\Models\User;
use App\Models\Team;
use App\Models\JobType;
use App\Models\WorkScope;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $authenticated_user = User::find(auth()->id());
        return view('pages.dashboard',[
        ]);
    }

    public function upload_profile_photo(Request $request)
    {
        $validation_rules = [
            'photo' => 'nullable|image|max:5000', // 5MB
        ];

        Validation::validate($request, $validation_rules,[], []);

        if(ErrorMessage::has_error())
        {
            return response()->json(array('response_type'=> 0, 'response_error' => ErrorMessage::$errors));
        }

        $authenticated_user = User::with('primary_email', 'primary_phone')->find(auth()->id());

        $authenticated_user->photo = $request->file('photo')->hashName(); // random full file name
        $request->file('photo')->storeAs('images/users', $authenticated_user->photo);

        $authenticated_user->save();

        session(['success_message' => 'Photo has been updated successfully']);

        return response()->json(array('response_type'=> 1));
    }
}
