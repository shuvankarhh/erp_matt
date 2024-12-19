<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Th extends Component
{
    public $align;

    public function __construct($align = 'text-left')
    {
        $this->align = $align;
    }


    public function render(): View|Closure|string
    {
        return view('components.th');
    }
}
