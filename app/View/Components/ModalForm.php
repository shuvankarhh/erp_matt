<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalForm extends Component
{
    public $title;
    public $action;
    public $put;

    public function __construct($title, $action, $put = false)
    {
        $this->title = $title;
        $this->action = $action;
        $this->put = $put;
    }

    public function render(): View|Closure|string
    {
        return view('components.modal-form');
    }
}
