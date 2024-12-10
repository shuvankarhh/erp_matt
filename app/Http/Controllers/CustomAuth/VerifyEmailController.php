<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\PasswordResetToken;

class VerifyEmailController extends Controller
{
    public function store(Request $request)
    {
        $validation_rules = [
            'email' => 'required',
            'verification_code' => 'required',
        ];

        Validation::validate($request, $validation_rules,[], []);

        $email = $request->get('email');
        $verification_code = $request->get('verification_code');

        // token expires after 5 minutes
        $expiration_time = now()->subMinutes(5);

        $password_reset_tokens = PasswordResetToken::where('email', $email)
        ->where('token', $verification_code)
        ->where('created_at', '>', $expiration_time)
        ->with('user:id,email')
        ->get();

        if(isset($password_reset_tokens[0]->email) == 0)
        {
            ErrorMessage::general_push("Verification failed.");
        }

        if(ErrorMessage::has_error())
        {
            return response()->json(array('response_type'=> 0, 'response_error'=> ErrorMessage::$errors));
        }

        // if everything ok
        $response_body =  view('partials._newpass_forgot_password_modal', [
            
        ]);

        return response()->json(array('response_type'=> 1, 'response_body'=> mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }
}
