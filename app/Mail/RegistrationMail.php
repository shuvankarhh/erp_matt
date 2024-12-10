<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $username;
    public $company_name;

    public function __construct($name,$username,$company_name)
    {
        $this->name = $name;
        $this->username = $username;
        $this->company_name = $company_name;
    }

    public function build()
    {
        return $this->view('mail.registration_email')
                    ->subject('Welcome to TakaPay');
    }
}
