<?php

namespace App\Http\Controllers\CustomAuth;

use Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RegistrationMail;
use App\Models\WebsiteSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

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

        return view('auth.login', []);
    }

    public function store(Request $request): RedirectResponse
    {
        $validation_rules = [

            'email' => 'required',
            'password' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors]);
        }

        $email = $request->get('email');

        $password = $request->get('password');
        $remember = $request->get('remember');

        $user = User::select('*')->where('email', $email)
            ->first();

        if (isset($user)) {
            if (Hash::check($password, $user->password) == 0) {
                ErrorMessage::general_push("The password is Invalid.");
            }
            if ($user->acting_status == 0) {
                ErrorMessage::general_push("Please contact with app admin for activate your user id.");
            }
        } else {
            ErrorMessage::general_push("The user does not exist."); // Actually the email does not exist, but we will show this message for security reason.
        }


        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors]);
        }
        auth()->loginUsingId($user->id, $remember ?? false);
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function registration_store(Request $request)
    {
        dd($request->all());
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully!',
            'user' => $user,
        ], 201);
    }

    public function registration_store_2(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
