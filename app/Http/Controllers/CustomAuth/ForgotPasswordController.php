<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\Email;
use App\Models\PasswordResetToken;
use App\Models\User;
use App\Models\WebsiteSetting;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot_password', [

        ]);
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'email' => 'required',
        ];

        Validation::validate($request, $validation_rules,[], []);

        $email = $request->get('email');

        $user = User::select('*')->where('email', $email)
        ->with('password_reset_token')
        ->first();

        if(isset($user->id))
        {
            if(isset($user->password_reset_token->email))
            {

                PasswordResetToken::where('email', $email)->delete();
            }

            $random_number = rand(999,9999);
            PasswordResetToken::create([
                'email' => $email,
                'token' => $random_number,
                'created_at' => now(),
            ]);

            if(config('app.env') == 'production')
            {
                $user_name = $user->first_name . ' ' . $user->last_name;
                $website_setting = WebsiteSetting::find(1);
                
                // sending email starts

                $data = array("user_name" => $user_name, "verification_code" => $random_number, "website_setting" => $website_setting);
                //Mail::send(['text'=>'verification_mail'], $data, function($message) use ($email, $user_name, $website_setting) {
                //     $message->from(config('mail.from.address'), $website_setting->company_name);
                //     $message->to($email, $user_name)->subject('Confirm your email address');
                // });

                // sending email end
            }
        } else
        {
            ErrorMessage::general_push("The user does not exist.");
        }

        if(ErrorMessage::has_error())
        {
            return response()->json(array('response_type'=> 0, 'response_error'=> ErrorMessage::$errors));
        }

        // if everything ok
        $response_body =  view('partials._forgot_password_modal', [
            
        ]);

        return response()->json(array('response_type'=> 1, 'response_body'=> mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }
}
