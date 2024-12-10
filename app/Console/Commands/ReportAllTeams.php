<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;
use App\Mail\ReportEmail;
use App\Models\ProjectDuration;
use App\Models\Email;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ReportAllTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:all-teams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date1 = ProjectDuration::first();
        $date2 = ProjectDuration::orderBy('id', 'desc')->first();
        $date1 = carbon::parse($date1->created_at);
        $date_1 = $date1->format('m-d-Y');
        $date2 = carbon::parse($date2->created_at);
        $date_2 = $date2->format('m-d-Y');
        

        $additionalData = [
            'team_id'=>'*',
            'date1' => $date1,
            'date2' => $date2,
            'date_1' => $date_1,
            'date_2' => $date_2,
        ];

        $pdf = new Dompdf();

        // Set options - if needed
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);

        // Load HTML content (you can pass Blade view as HTML content)
        $pdf->loadHtml(view('Exports.excel_report', [
            'additionalData' => $additionalData,
        ]));
        $pdf->render();
        $pdfOutput = $pdf->output();
        $email=Email::first();
        
        $excel = Excel::store(new DataExport($additionalData), 'exports/Report_of_all_Teams.xlsx');
        // $excelFilePath = storage_path('exports/Report_of_all_Teams.xlsx');
        $excelFilePath = $excelFilePath = Storage::path('exports/Report_of_all_Teams.xlsx');

        
        
        Mail::to($email->email)->send(new ReportEmail($pdfOutput,$excelFilePath,$date_1,$date_2));

        
    }
}
