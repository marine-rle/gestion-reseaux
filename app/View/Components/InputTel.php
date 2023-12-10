<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTel extends Component
{
    /**
     * Create a new component instance.
     */
    public $property;
    public $value;
    public function __construct($property, $value = null)
    {
        $this-> property = $property;
        $this-> value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-tel');
    }
}
