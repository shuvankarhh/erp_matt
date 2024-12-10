<?php

namespace App\Http\Controllers\CustomAuth;

use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\User;
use App\Models\WebsiteSetting;

class AuthController extends Controller
{
    public function index()
    {
        // We don't need this code because it is already set by "app\Providers\RouteServiceProvider.php".

        // $this_user_id = auth()->id();

        // if(isset($this_user_id) && $this_user_id != 0)
        // {
        //     // dashboard
        //     return redirect(route('dashboard'));
        // }

        return view('login', [

        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validation_rules = [
            
            'email' => 'required',
            'password' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if(ErrorMessage::has_error())
        {
            return back()->with(['errors' => ErrorMessage::$errors]);
        }

        $email = $request->get('email');
        
        $password = $request->get('password');
        $remember = $request->get('remember');

        $user = User::select('*')->where('email', $email)
        ->first();

        if(isset($user))
        {
            if(Hash::check($password, $user->password) == 0)
            {
                ErrorMessage::general_push("The password is Invalid.");
            }
            if($user->acting_status == 0 )
            {
                ErrorMessage::general_push("Please contact with app admin for activate your user id.");
            }
        } else
        {
            ErrorMessage::general_push("The user does not exist."); // Actually the email does not exist, but we will show this message for security reason.
        }
        

        if(ErrorMessage::has_error())
        {
            return back()->with(['errors' => ErrorMessage::$errors]);
        }
        auth()->loginUsingId($user->id, $remember ?? false);
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    /**
     * Destroy an authenticated session.
    */
    
    public function destroy(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
