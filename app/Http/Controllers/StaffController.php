<?php

namespace App\Http\Controllers;

use App\Exports\StaffExport;
use App\Imports\StaffsImport;
use App\Models\City;
use App\Models\Team;
use App\Models\User;
use App\Models\Staff;
use App\Models\Country;
use App\Models\UserRole;
use App\Models\Designation;
use App\Models\ProfilePhoto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\StorageHandlers\DynamicStorageHandler;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::addSelect(['userId' => Staff::select('name')
            ->whereColumn('id', 'crm_staffs.user_id')
            ->limit(1)])
            ->with('profile_photos', 'user', 'team', 'designation')
            ->orderby('userId')
            ->paginate();
        $pagination = Pagination::default($staffs);
        $does_profile_photo_exist = false;
        foreach($staffs as $staff) {
            if (isset($staff->user->profile_photo->storage_provider_id)) {
                $dynamic = new DynamicStorageHandler;
                $does_profile_photo_exist = $dynamic->exists($staff->user->profile_photo->photo_path, $staff->user->profile_photo->storage_provider->alias);
            }
            if ($does_profile_photo_exist) {
                $staff->user_profile_photo_url = $staff->user->profile_photo->photo_url ?? null;
            } else {
                $staff->user_profile_photo_url = '/images/user.png';
            }
        }

        return view('staffs.staff_index', [
            'staffs' => $staffs,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        $countries = Country::all();
        $teams = Team::all();
        $designations = Designation::all();
        $userRole = UserRole::where('id', 3)->first();
        $staffs = Staff::all();
        return view('staffs.staff_create', [
            'designations' => $designations,
            'userRole' => $userRole,
            'teams' => $teams,
            'countries' => $countries,
            'staffs' => $staffs
        ]);
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email'),
            ],
            'staff_reference_id' => [
                Rule::unique('crm_staffs', 'staff_reference_id'),
            ],
            'photo' => 'nullable|image|max:5000', // 5MB
            'password' => 'required',
            'address' => 'required',
            'team_id' => 'required',
            'designation_id' => 'required',
            'gender' => 'required'
        ];

        Validation::validate($request, $validation_rules, [], []);
        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except('photo')]);
        }

        $user = new User;
        $user->password = Hash::make($request->password);
        $user->user_role_id = 3;
        $user->acting_status = $request->get('acting_status');
        $user->email = $request->get('email');
        $user->name = $request->get('name');

        $staff = new Staff;
        $staff->name = $request->get('name');
        $staff->short_name = $request->get('short_name');
        $staff->staff_reference_id = $request->get('staff_reference_id');
        $staff->phone = $request->get('phone');
        $staff->phone_code = $request->get('phone_code');
        $staff->line_manager = $request->get('line_manager');
        $staff->address = $request->get('address');
        $staff->gender = $request->get('gender');
        $staff->team_id = $request->get('team_id');
        $staff->designation_id = $request->get('designation_id');
        DB::transaction(function () use ($user, $staff) {
            $user->save();
            $staff->user_id = $user->id;
            $staff->save();
        });

        if ($request->hasFile('photo')) {
            $dynamic = new DynamicStorageHandler;
            $upload_info = $dynamic->upload($request->file('photo'), 'profile_photos');
            ProfilePhoto::create([
                'user_id' => $user->id,
                'storage_provider_id' => $upload_info['storage_provider_id'],
                'is_private_photo' => false,
                'photo_path' => $upload_info['uploaded_path'],
                'photo_url' => $upload_info['uploaded_url'],
                'original_photo_name' => $request->file('photo')->getClientOriginalName()
            ]);
        }

        return redirect()->back()->with(['success_message' => 'Stuff has been Created successfully']);
    }

    public function edit($id)
    {
        $countries = Country::all();
        $id = Staff::decrypted_id($id);
        $staff = Staff::where('id', $id)->with('user.profile_photo.storage_provider', 'user')->first();
        $designations = Designation::all();
        $teams = Team::all();

        $staffs = Staff::all();
        $does_profile_photo_exist = false;

        if (isset($staff->user->profile_photo->storage_provider_id)) {
            $dynamic = new DynamicStorageHandler;

            $does_profile_photo_exist = $dynamic->exists($staff->user->profile_photo->photo_path, $staff->user->profile_photo->storage_provider->alias);
        }

        if ($does_profile_photo_exist) {
            $staff->user_profile_photo_url = $staff->user->profile_photo->photo_url;
        } else {
            $staff->user_profile_photo_url = '/images/user.png';
        }

        return view('staffs.staff_edit', [
            'designations' => $designations,
            'teams' => $teams,
            'staff' => $staff,
            'staffs' => $staffs,
            'countries' => $countries
        ]);
    }


    public function update(Request $request, $id)
    {
        $id = Staff::decrypted_id($id);
        $staff = Staff::find($id);
        $users = User::where('id', $staff->user_id)->first();
        $user = User::find($users->id);
        $validation_rules = [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'staff_reference_id' => [
                Rule::unique('crm_staffs', 'staff_reference_id')->ignore($staff->id),
            ],
            'photo' => 'nullable|image|max:5000', // 5MB
            'address' => 'required',
            'team_id' => 'required',
            'designation_id' => 'required'
        ];
        Validation::validate($request, $validation_rules, [], []);
        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except('photo')]);
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->user_role_id = 3;
        $user->acting_status = $request->get('acting_status');
        $user->email = $request->get('email');

        $staff->name = $request->get('name');
        $staff->short_name = $request->get('short_name');
        $staff->staff_reference_id = $request->get('staff_reference_id');
        $staff->phone = $request->get('phone');
        $staff->phone_code = $request->get('phone_code');
        $staff->line_manager = $request->get('line_manager');
        $staff->address = $request->get('address');
        $staff->gender = $request->get('gender');
        $staff->team_id = $request->get('team_id');
        $staff->designation_id = $request->get('designation_id');

        DB::transaction(function () use ($user, $staff) {
            $user->save();
            $staff->user_id = $user->id;
            $staff->save();
        });

        if ($request->hasFile('photo')) {
            $profile_photo = ProfilePhoto::where('user_id', $user->id)->first();

            if (isset($profile_photo)) {
                $profile_photo = ProfilePhoto::find($profile_photo->id);

                $dynamic = new DynamicStorageHandler;

                $dynamic->delete($profile_photo->photo_path);

                $upload_info = $dynamic->upload($request->file('photo'), 'profile_photos');

                $profile_photo->storage_provider_id = $upload_info['storage_provider_id'];
                $profile_photo->is_private_photo = false;
                $profile_photo->photo_path = $upload_info['uploaded_path'];
                $profile_photo->photo_url = $upload_info['uploaded_url'];
                $profile_photo->original_photo_name = $request->file('photo')->getClientOriginalName();
                $profile_photo->save();
            } else {
                $dynamic = new DynamicStorageHandler;

                $upload_info = $dynamic->upload($request->file('photo'), 'profile_photos');

                ProfilePhoto::create([
                    'user_id' => $user->id,
                    'storage_provider_id' => $upload_info['storage_provider_id'],
                    'is_private_photo' => false,
                    'photo_path' => $upload_info['uploaded_path'],
                    'photo_url' => $upload_info['uploaded_url'],
                    'original_photo_name' => $request->file('photo')->getClientOriginalName()
                ]);
            }
        }
        return redirect()->route('staffs.index')->with(['success_message' => 'Stuff has been Created successfully']);
    }

    public function destroy(string $id)
    {
        $id = Staff::decrypted_id($id);
        $stuff = Staff::find($id);
        DB::transaction(function () use ($id, $stuff) {

            User::find($stuff->user_id)->delete();
            $x = Staff::where('id', $id)->first();
            $x->delete();
        });
        return response()->json(array('response_type' => 1));
    }

    public function export()
    {
        return Excel::download(new StaffExport, 'staffs.xlsx');
    }

    public function importView()
    {
        return view('staffs.import_view');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new StaffsImport, $file);

        return redirect('/')->with('success', 'All good!');
    }
}
