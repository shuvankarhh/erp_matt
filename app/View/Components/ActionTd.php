<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionTd extends Component
{
    public $show;
    public $edit;
    public $delete;

    public function __construct($show = false, $edit = false, $delete = false)
    {
        $this->show = $show;
        $this->edit = $edit;
        $this->delete = $delete;
    }

    public function render(): View|Closure|string
    {
        return view('components.action-td');
    }
}
