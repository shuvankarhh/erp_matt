<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\WebsiteSetting;
use App\Models\Notification;

class DashboardLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $pagename = null)
    {
        $this->pagename = $pagename;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $website_settings = WebsiteSetting::select('company_name', 'company_logo', 'favicon', 'seo_description')->find(1);

        // notifications within 7 days or unseen notifications
        $notifications = Notification::select('*')
        ->where('user_id', auth()->id())
        ->where(function ($query) {
            $query->where('created_at', '>=', now()->subDays(7))
            ->orWhere('is_seen', 0);
        })
        ->orderBy('created_at', 'desc')
        ->get();

        // unseen notifications
        $unseen_notifications_count = Notification::select('*')
        ->where('user_id', auth()->id())
        ->where('is_seen', 0)
        ->count();

        return view('components.dashboard-layout', [
            'website_settings' => $website_settings,
            'notifications' => $notifications,
            'unseen_notifications_count' => $unseen_notifications_count
        ]);
    }
}
