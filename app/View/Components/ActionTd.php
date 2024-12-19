<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionTd extends Component
{
    public $show;
    public $edit;
    public $editModal;
    public $delete;
    public $simpleDelete;
    public $name;

    public function __construct($show = false, $edit = false, $editModal = false, $delete = false, $simpleDelete = false, $name = '')
    {
        $this->show = $show;
        $this->edit = $edit;
        $this->editModal = $editModal;
        $this->delete = $delete;
        $this->simpleDelete = $simpleDelete;
        $this->name = $name;
    }

    public function render(): View|Closure|string
    {
        return view('components.action-td');
    }
}
