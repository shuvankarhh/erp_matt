<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalLayout extends Component
{
    public $layout;

    public function __construct($layout = null)
    {
        $this->layout = $layout;
    }

    public function render(): View|Closure|string
    {
        return view('components.modal-layout');
    }
}
