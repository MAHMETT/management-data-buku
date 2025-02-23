<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class A extends Component
{
    /**
     * Create a new component instance.
     */

    public $href;
    public $bg;
    public function __construct($href = '#' , $bg = 'blue')
    {
        $this->href = $href;
        $this->bg = $bg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.a');
    }
}
