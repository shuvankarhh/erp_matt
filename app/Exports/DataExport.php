<?php

namespace App\Exports;

use App\Invoice;
use App\Models\Teams;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class DataExport implements FromView, ShouldAutoSize
{

    protected $scFi;

    public function __construct($scFi)
    {

        $this->scFi = $scFi;
    }

    public function view(): View
    {
        return view('scheme_bins_export', [
            'scFi' => $this->scFi
        ]);
    }

    public function columnFormats(): array
    {
        return [
            'A' => 'yyyy-mm-dd', // Format for column A (e.g., numeric)
            'B' => 'yyyy-mm-dd', // Format for column B (e.g., text)
        ];
    }
}
