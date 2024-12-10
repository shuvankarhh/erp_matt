<?php
namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport; // Assuming you'll create an Export class

class ExportController extends Controller
{
    public function exportData()
    {
        return Excel::download(new DataExport, 'data.xlsx');
    }
}