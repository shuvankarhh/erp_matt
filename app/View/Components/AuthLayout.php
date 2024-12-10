<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\WebsiteSetting;

class AuthLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $pagename = null, public $action = null)
    {
        $this->pagename = $pagename;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $website_settings = WebsiteSetting::select('company_name', 'company_logo', 'favicon', 'seo_description')->find(1);

        return view('components.auth-layout', ['website_settings' => $website_settings]);
    }
}
