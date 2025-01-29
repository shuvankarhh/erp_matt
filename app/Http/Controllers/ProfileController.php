<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;
use App\Models\Country;
use App\Models\ProfilePhoto;
use App\Models\CustomerAccount;
use App\Models\Organization;
use Illuminate\Validation\Rule;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\StorageHandlers\DynamicStorageHandler;



class ProfileController extends Controller
{
    public function index()
    {
        $user = User::select('*')
            ->with('role:id,name')
            ->find(auth()->user()->id);
        $user_phone = Phone::select('*')->where('user_id', auth()->user()->id)->first();
        $does_profile_photo_exist = false;
        $countries = Country::all();
        $contact = CustomerAccount::with('contact', 'contact.organization')->select('*')->where('user_id', auth()->user()->id)->first();
        $staff = Staff::with('designation')->where('user_id', auth()->user()->id)->first();
        $organizations = Organization::all();
        if (isset($user->profile_photo->storage_provider_id)) {
            $dynamic = new DynamicStorageHandler;
            $does_profile_photo_exist = $dynamic->exists($user->profile_photo->photo_path, $user->profile_photo->storage_provider->alias);
        }

        if ($does_profile_photo_exist) {
            $user_profile_photo_url = $user->profile_photo->photo_url;
        } else {
            $user_profile_photo_url = '/images/user.png';
        }
        return view('profile', [
            'user' => $user,
            'contact' => $contact,
            'organizations' => $organizations,
            'user_phone' => $user_phone,
            'countries' => $countries,
            'user_profile_photo_url' => $user_profile_photo_url,
            'staff' => $staff
        ]);
    }

    public function update(Request $request, $id)
    {
        $id = User::decrypted_id($id);
        if (auth()->user()->id == $id) {
            $user = User::find($id);
            $validation_rules = [
                'name' => 'required',
                'phone' => 'max:30',
                'email' => [
                    'required',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'photo' => 'nullable|image|max:5000', // 5MB
            ];

            $validation_names = [
                'name' => 'full name',
                'email' => 'email',
                'photo' => 'photo',
            ];
            Validation::validate($request, $validation_rules, [], $validation_names);
            if (ErrorMessage::has_error()) {
                return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
            }



            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->hasFile('photo')) {
                $dynamic = new DynamicStorageHandler;
                $upload_info = $dynamic->upload($request->file('photo'), 'profile_photos');
                ProfilePhoto::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'storage_provider_id' => $upload_info['storage_provider_id'],
                        'is_private_photo' => false,
                        'photo_path' => $upload_info['uploaded_path'],
                        'photo_url' => $upload_info['uploaded_url'],
                        'original_photo_name' => $request->file('photo')->getClientOriginalName()
                    ]
                );
            }

            if (auth()->user()->user_role_id == 2) {
                $contact_account = CustomerAccount::where('user_id', $user->id)->first();
                $contact = Contact::where('id', $contact_account->contact_id)->first();
                $contact->name = $request->name;
                $contact->email = $request->email;
                $contact->job_title = $request->job_title;
                $contact->organization_id = $request->organization_id;
                $contact->phone = $request->phone;
                $contact->phone_code = $request->phone_code;

                DB::transaction(function () use ($user, $contact) {
                    $user->save();
                    $contact->save();
                });
            } elseif (auth()->user()->user_role_id == 3) {
                $staff = Staff::where('user_id', $id)->first();
                $staff->phone = $request->phone;
                $staff->phone_code = $request->phone_code;
                DB::transaction(function () use ($user, $staff) {
                    $user->save();
                    $staff->save();
                });
            } else {
                $user->save();
            }
            return redirect()->back()->with(['success_message' => ' Profile has been updated successfully']);
        } else {
            return redirect()->back()->with(['error_message' => ' Permission Denied']);
        }
    }


    public function change_password(Request $request, $id)
    {
        $id = User::decrypted_id($id);
        if (auth()->user()->id == $id) {
            $validation_rules = [
                'old_password' => 'required',
                'new_password' => 'required',
                'con_password' => 'required',
            ];
            $validation_names = [
                'old_password' => 'Old Password',
                'new_password' => 'New password',
                'con_password' => 'confirm password',
            ];
            Validation::validate($request, $validation_rules, [], $validation_names);
            if (ErrorMessage::has_error()) {
                return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
            }

            $user = User::find($id);

            if (Hash::check($request->old_password, $user->password) == 0) {
                ErrorMessage::general_push("The old password is Invalid.");
            }
            if (ErrorMessage::has_error()) {
                return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
            }
            if ($request->new_password == $request->con_password) {
                $user->password = Hash::make($request->new_password);
            } else {
                ErrorMessage::general_push("The passwords are not same.");
            }
            if (ErrorMessage::has_error()) {
                return back()->with(['errors' => ErrorMessage::$errors]);
            }
            $user->save();
            return redirect()->back()->with(['success_message' => ' Profile has been updated successfully']);
        } else {
            return redirect()->back()->with(['error_message' => ' Permission Denied']);
        }
    }
}
