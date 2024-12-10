<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\WebsiteSetting;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $website_set = WebsiteSetting::first();
        if($website_set->is_auto_report == 1){

            if($website_set->auto_report_scedule == 1)
            {
                $schedule->command('report:all-teams')->weekly();
    
            }elseif($website_set->auto_report_scedule == 2){
    
                $schedule->command('report:all-teams')->monthly();
    
            }elseif($website_set->auto_report_scedule == 3){
    
                $schedule->command('report:all-teams')->quarterly();
    
            }elseif($website_set->auto_report_scedule == 4){
    
                $schedule->command('report:all-teams')->yearly();
            }
            
        }
        

        $schedule->command('notify:few-bidding-days-remaining')->hourly(); // becareful of large number of users
        $schedule->command('emails:send-queued')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
