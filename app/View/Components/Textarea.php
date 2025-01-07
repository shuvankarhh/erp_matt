<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $name;
    public $value;
    public $rows;
    public $placeholder;
    public $required;

    public function __construct($label, $name, $value = null, $rows = 1, $placeholder = null, $required = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->rows = $rows;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.textarea');
    }
}

