<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Notification;
use App\Models\QueuedEmail;
use App\Models\Project;
use App\Models\User;

class NotifyFewBiddingDaysRemaining extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:few-bidding-days-remaining';

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
        $users = User::select('id', 'first_name', 'last_name', 'email_id')->with('primary_email:id,email', 'assigned_estimator_biddings:id,assigned_estimator_id,project_id,bid_due_date')->get();
        
        foreach($users as $user)
        {
            $notification_description = 'You have '; // do not print escaped html in email
            $has_due_bidding = false;

            foreach($user->assigned_estimator_biddings as $bidding)
            {
                $days_remaining = now()->diffInDays($bidding->bid_due_date);

                if ($days_remaining <= 5 || now() > $bidding->bid_due_date) {
                    // if $has_due_bidding will be true at the end of first loop. So we can add ', ' to $notification_description from the second loop.
                    if($has_due_bidding) {
                        $notification_description = $notification_description . ', ';
                    }

                    $project = Project::select('name')->find($bidding->project_id);

                    $notification_description = $notification_description . $days_remaining .' day(s) remaining in a bidding with project ' . $project->name;

                    $has_due_bidding = true;
                }
            }

            $notification_description = $notification_description . '.';

            if($has_due_bidding) {
                Notification::create([
                    'user_id' => $user->id,
                    'description' => $notification_description,
                ]);

                $data = array("email_address" => $user->primary_email->email, "user_name" => $user->first_name . ' ' . $user->last_name, "notification_description" => $notification_description);

                QueuedEmail::create([
                    'type' => 1,
                    'data' => json_encode($data),
                ]);
            }
        }
    }
}
