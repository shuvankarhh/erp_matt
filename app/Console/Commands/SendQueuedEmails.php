<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Services\BuiltInWebsiteSettings;
use App\Models\WebsiteSetting;
use App\Models\QueuedEmail;

class SendQueuedEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send-queued';

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
        $company_name = WebsiteSetting::select('company_name')->find(1)->company_name;
        $queued_emails = QueuedEmail::select('*')
        ->where('is_sent', 0)
        ->where('created_at', '>=', now()->subDays(7))
        ->get();

        $email_per_hour = BuiltInWebsiteSettings::$email_per_hour;

        foreach($queued_emails as $queued_email)
        {
            if ($email_per_hour > 0) {
                // sending email starts
                try {
                    $data = json_decode($queued_email->data, true);
                    $data["company_name"] = $company_name;

                    Mail::send(['text'=>'few_days_remaining_mail'], $data, function($email) use ($data, $company_name) {
                        $email->from(config('mail.from.address'), $company_name);
                        $email->to($data["email_address"], $data["user_name"])->subject('Few bidding days remaining');
                    });
                    
                    $queued_email->is_sent = 1;

                    $queued_email->save();

                } catch (\Exception $e) {
                    Log::info($e->getMessage());

                    $queued_email->error_message = $e->getMessage();

                    $queued_email->save();
                }

                $email_per_hour--;
                // sending email end
            }
        }
    }
}
