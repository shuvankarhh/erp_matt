<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StaffExport implements FromCollection, WithHeadings, WithMapping
{
    protected $index = 0;

    public function collection()
    {
        // dd(Staff::with('lineManager')->get());
        return Staff::with('lineManager', 'team', 'designationWithTrashed')->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Short Name',
            'Staff Reference ID',
            'Phone',
            'Line Manager',
            'Gender',
            'Address',
            'Team',
            'Designation',
        ];
    }

    public function map($staff): array
    {
        $gender = "";

        if ($staff->gender == 1) {
            $gender = "Male";
        } elseif ($staff->gender == 2) {
            $gender = "Female";
        }
        return [
            ++$this->index,
            $staff->name,
            $staff->short_name,
            $staff->staff_reference_id,
            (string)$staff->phone_code . (string)$staff->phone,
            $staff->lineManager ? $staff->lineManager->name : '-',
            $gender,
            $staff->address,
            $staff->team ? $staff->team->name : '-',
            $staff->designationWithTrashed ? $staff->designationWithTrashed->name : '-',
        ];
    }
}
