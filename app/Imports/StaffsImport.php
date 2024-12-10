<?php

namespace App\Imports;

use App\Models\Team;
use App\Models\User;
use App\Models\Staff;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StaffsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row['staff_reference']);
        $user = new User();
        $user->name = $row['name'];
        $user->email = $row['email'];
        $user->password = Hash::make($row['password']);
        $user->$row['acting_status'];
        $user->save();

        return new Staff([
            'name' => $row['name'],
            'short_name' => $row['short_name'],
            'staff_reference_id' => $row['staff_reference'],
            'phone_code' => $row['phone_code'],
            'phone' => $row['phone'],
            'line_manager' => Staff::where('name', $row['line_manager'])->pluck('id')->first(),
            'gender' => $row['gender'],
            'address' => $row['address'],
            'team_id' => Team::where('name', $row['team'])->pluck('id')->first(),
            'designation_id' => Designation::where('name', $row['designation'])->pluck('id')->first(),
        ]);
    }
}
