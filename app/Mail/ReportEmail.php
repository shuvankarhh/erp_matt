<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdf;
    public $excel;
    public $date_2;
    public $date_1;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf , $excel,$date_1,$date_2)
    {
        
        $this->pdf = $pdf;
        $this->excel = $excel;
        $this->date_2 = $date_2;
        $this->date_1 = $date_1;
        $this->date_1 = $date_1;
        


    }

    public function build()
    {
        $fileName = "Report_of_all_Teams.pdf";
        $fileName2 = "Report_of_all_Teams.xlsx";
        return $this->markdown('report_all_teams')
        ->attachData($this->pdf, $fileName)
        ->attach($this->excel, [
            'as' => 'report.xlsx',
            'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])
        // ->attachData($this->excel, $fileName2)
        ;
    }
}
