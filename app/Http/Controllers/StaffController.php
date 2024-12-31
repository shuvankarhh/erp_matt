<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Team;
use App\Models\User;
use App\Models\Staff;
use App\Models\Country;
use App\Models\UserRole;
use App\Models\Designation;
use App\Exports\StaffExport;
use App\Models\ProfilePhoto;
use Illuminate\Http\Request;
use App\Imports\StaffsImport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Services\StorageHandlers\DynamicStorageHandler;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::addSelect(['userId' => Staff::select('name')
            ->whereColumn('id', 'crm_staffs.user_id')
            ->limit(1)])
            ->with('user', 'profile_photo', 'team', 'designation')
            ->orderby('userId')
            ->paginate();

        return view('staffs.index', [
            'staffs' => $staffs
        ]);
    }

    public function create()
    {
        $genders = [
            1 => 'Male',
            2 => 'Female',
            3 => 'Other'
        ];

        $statuses = [
            1 => 'Active',
            2 => 'Inactive'
        ];

        $staffs = Staff::pluck('name', 'id');
        $teams = Team::pluck('name', 'id');
        $designations = Designation::pluck('name', 'id');
        $countries = Country::all();
        $userRole = UserRole::where('id', 3)->first();
        return view('staffs.create', [
            'staffs' => $staffs,
            'genders' => $genders,
            'statuses' => $statuses,
            'teams' => $teams,
            'designations' => $designations,
            'userRole' => $userRole,
            'countries' => $countries,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable',
            'email' => [
                'nullable',
                Rule::unique('users', 'email'),
            ],
            'staff_reference_id' => [
                Rule::unique('crm_staffs', 'staff_reference_id'),
            ],
            'photo' => 'nullable|image|max:5000', // 5MB
            'password' => 'nullable',
            'address' => 'nullable',
            'team_id' => 'nullable',
            'designation_id' => 'nullable',
            'gender' => 'nullable'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $user = new User;
        $user->tenant_id = $tenant_id;
        $user->password = Hash::make($request->password);
        $user->user_role_id = 3;
        $user->acting_status = $request->get('acting_status');
        $user->email = $request->get('email');
        $user->name = $request->get('name');

        $staff = new Staff;
        $staff->tenant_id = $tenant_id;
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
            $path = $request->file('photo')->store('profile_photos', 'public');

            $profile_photo = new ProfilePhoto();
            $profile_photo->tenant_id = $tenant_id;
            $profile_photo->user_id = $user->id;
            $profile_photo->staff_id = $staff->id;
            $profile_photo->storage_provider_id = 1;
            $profile_photo->is_private_photo = true;
            $profile_photo->photo_path = $path;
            $profile_photo->photo_url = Storage::url($path);
            $profile_photo->original_photo_name = $request->file('photo')->getClientOriginalName();
            $profile_photo->save();
        }

        // if ($request->hasFile('photo')) {
        //     $dynamic = new DynamicStorageHandler;
        //     $upload_info = $dynamic->upload($request->file('photo'), 'profile_photos');
        //     ProfilePhoto::create([
        //         'tenant_id' => $tenant_id,
        //         'user_id' => $user->id,
        //         'storage_provider_id' => $upload_info['storage_provider_id'],
        //         'is_private_photo' => false,
        //         'photo_path' => $upload_info['uploaded_path'],
        //         'photo_url' => $upload_info['uploaded_url'],
        //         'original_photo_name' => $request->file('photo')->getClientOriginalName()
        //     ]);
        // }

        return redirect()->route('staffs.index')->with(['success_message' => 'Staff has been added successfully!!!']);
    }

    public function edit($id)
    {
        $genders = [
            1 => 'Male',
            2 => 'Female',
            3 => 'Other'
        ];

        $statuses = [
            1 => 'Active',
            2 => 'Inactive'
        ];

        $staffs = Staff::pluck('name', 'id');
        $teams = Team::pluck('name', 'id');
        $designations = Designation::pluck('name', 'id');

        $countries = Country::all();
        $id = Staff::decrypted_id($id);
        $staff = Staff::where('id', $id)->with('user.profile_photo.storage_provider', 'user')->first();
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

        return view('staffs.edit', [
            'staff' => $staff,
            'staffs' => $staffs,
            'genders' => $genders,
            'statuses' => $statuses,
            'teams' => $teams,
            'designations' => $designations,
            'countries' => $countries
        ]);
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());

        $decryptedStaffId = Staff::decrypted_id($id);
        $staff = Staff::find($decryptedStaffId);

        $user = $staff->user;

        $request->validate([
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
        ]);

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
            // dd('im here');
            $profile_photo = ProfilePhoto::where('user_id', $user->id)
                ->where('staff_id', $staff->id)
                ->first();
            // dd($profile_photo);
            // $profile_photo = ProfilePhoto::firstOrNew([
            //     'staff_id' => $staff->id,
            //     'user_id' => $user->id,
            //     'tenant_id' => $user->tenant_id,
            // ]);

            // dd($profile_photo->exists);
            // dd($profile_photo->exists, 'ok', Storage::exists($profile_photo->photo_path), Storage::disk('public')->exists($profile_photo->photo_path));

            if ($profile_photo->exists && Storage::disk('public')->exists($profile_photo->photo_path)) {
                Storage::disk('public')->delete($profile_photo->photo_path);
            }

            $path = $request->file('photo')->store('profile_photos', 'public');

            $profile_photo->storage_provider_id = 1;
            $profile_photo->is_private_photo = false;
            $profile_photo->photo_path = $path;
            $profile_photo->photo_url = Storage::url($path);
            $profile_photo->original_photo_name = $request->file('photo')->getClientOriginalName();
            $profile_photo->save();
        }


        // if ($request->hasFile('photo')) {
        //     $profile_photo = ProfilePhoto::where('user_id', $user->id)->first();

        //     if (!$profile_photo) {
        //         $profile_photo = new ProfilePhoto();
        //         $profile_photo->user_id = $user->id;
        //     }

        //     if (isset($profile_photo)) {
        //         // $profile_photo = ProfilePhoto::find($profile_photo->id);

        //         $dynamic = new DynamicStorageHandler;

        //         $dynamic->delete($profile_photo->photo_path);

        //         $upload_info = $dynamic->upload($request->file('photo'), 'profile_photos');

        //         $profile_photo->storage_provider_id = $upload_info['storage_provider_id'];
        //         $profile_photo->is_private_photo = false;
        //         $profile_photo->photo_path = $upload_info['uploaded_path'];
        //         $profile_photo->photo_url = $upload_info['uploaded_url'];
        //         $profile_photo->original_photo_name = $request->file('photo')->getClientOriginalName();
        //         $profile_photo->save();
        //     } else {
        //         $dynamic = new DynamicStorageHandler;

        //         $upload_info = $dynamic->upload($request->file('photo'), 'profile_photos');

        //         ProfilePhoto::create([
        //             'user_id' => $user->id,
        //             'storage_provider_id' => $upload_info['storage_provider_id'],
        //             'is_private_photo' => false,
        //             'photo_path' => $upload_info['uploaded_path'],
        //             'photo_url' => $upload_info['uploaded_url'],
        //             'original_photo_name' => $request->file('photo')->getClientOriginalName()
        //         ]);
        //     }
        // }

        return redirect()->route('staffs.index')->with(['success_message' => 'Staff has been updated successfully!!!']);
    }

    public function destroy(string $id)
    {
        $decryptedStaffId = Staff::decrypted_id($id);
        $staff = Staff::find($decryptedStaffId);

        if ($staff) {
            if ($staff->user) {
                $staff->user->delete();
            }

            $staff->delete();

            session(['success_message' => 'Staff has been deleted successfully!!!']);

            return response()->json(['response_type' => 1]);
        }
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
