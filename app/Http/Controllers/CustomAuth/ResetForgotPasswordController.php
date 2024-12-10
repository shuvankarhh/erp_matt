<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\User;
use App\Models\PasswordResetToken;

class ResetForgotPasswordController extends Controller
{
    public function store(Request $request)
    {
        $validation_rules = [
            'email' => 'required',
            'verification_code' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ];

        Validation::validate($request, $validation_rules,[], []);

        $email = $request->get('email');
        $verification_code = $request->get('verification_code');
        $password = $request->get('password');
        $confirm_password = $request->get('confirm_password');

        if ($password != $confirm_password) {
            ErrorMessage::general_push("Passwords do not match.");
        }

        // token expires after 5 minutes
        $expiration_time = now()->subMinutes(5);

        $password_reset_tokens = PasswordResetToken::where('email', $email)
        ->where('token', $verification_code)
        ->where('created_at', '>', $expiration_time)
        ->with('user:id,email')
        ->get();

        if(isset($password_reset_tokens[0]->email) == 0)
        {
            ErrorMessage::general_push("Resetting the password failed. Send email again.");
        }

        if(ErrorMessage::has_error())
        {
            return response()->json(array('response_type'=> 0, 'response_error'=> ErrorMessage::$errors));
        }

        // if everything ok
        $user = User::find($password_reset_tokens[0]->user->id);
        $user->password = $password;
        $user->save();
        
        // sign in
        auth()->loginUsingId($user->id);
        $request->session()->regenerate();

        return response()->json(array('response_type'=> 1, 'redirect_url'=> route('dashboard')));
    }
}
