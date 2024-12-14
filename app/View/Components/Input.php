<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $name;
    public $type;
    public $value;
    public $placeholder;
    public $required;
    public $attributes;

    public function __construct($label, $name, $type = 'text', $value = null, $placeholder = null, $required = false, $attributes = [])
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->attributes = $attributes;
    }

    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
