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
    public $formId;
    public $onSubmit;
    public $onClick;

    public function __construct($title, $action, $put = false, $formId = null, $onSubmit = null, $onClick = null)
    {
        $this->title = $title;
        $this->action = $action;
        $this->put = $put;
        $this->formId = $formId;
        $this->onSubmit = $onSubmit;
        $this->onClick = $onClick;
    }

    public function render(): View|Closure|string
    {
        return view('components.modal-form');
    }
}
