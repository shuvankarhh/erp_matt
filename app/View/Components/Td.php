<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Td extends Component
{
    public $class;

    public function __construct($class = '')
    {
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.td');
    }
}
