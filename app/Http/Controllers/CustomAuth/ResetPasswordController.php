<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('reset_password', [

        ]);
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'old_password' => 'required',
            'new_password' => 'required',
        ];

        Validation::validate($request, $validation_rules,[], []);

        if(ErrorMessage::has_error())
        {
            return back()->with(['errors' => ErrorMessage::$errors]);
        }

        $old_password = $request->get('old_password');
        $new_password = $request->get('new_password');

        $user = User::find(auth()->id());

        if(Hash::check($old_password, $user->password))
        {
            $user->password = $new_password;
            $user->save();
        } else {
            ErrorMessage::general_push("The password does not match.");
        }

        if(ErrorMessage::has_error())
        {
            return back()->with(['errors' => ErrorMessage::$errors]);
        }

        return redirect(route('dashboard'));
    }
}
