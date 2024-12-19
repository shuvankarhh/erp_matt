<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $header;
    public $action;
    public $put;

    public function __construct($header, $action, $put = false)
    {
        $this->header = $header;
        $this->action = $action;
        $this->put = $put;
    }

    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
