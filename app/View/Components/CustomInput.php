<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomInput extends Component
{
    public $label;
    public $name;
    public $type;
    public $placeholder;
    public $wireModel;
    public $value;

    public function __construct($label, $name, $type = 'text', $placeholder = '', $wireModel = null, $value = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->wireModel = $wireModel;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom-input');
    }
}
