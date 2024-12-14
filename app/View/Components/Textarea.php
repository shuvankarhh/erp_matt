<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $name;
    public $value;
    public $placeholder;
    public $required;

    public function __construct($label, $name, $value = null, $placeholder = null, $required = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.textarea');
    }
}

