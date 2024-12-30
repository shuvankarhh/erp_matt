<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;
    public $selected;
    public $placeholder;
    public $required;
    public $readonly;
    public $disabled;

    public function __construct(
        $name,
        $label = null,
        $options = [],
        $selected = null,
        $placeholder = null,
        $required = false,
        $readonly = false,
        $disabled = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.select');
    }
}
