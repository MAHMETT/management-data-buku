<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submitbtn extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $bg;
    
    public function __construct($type = 'submit' , $bg = 'blue')
    {   
        $this->type = $type;
        $this->bg = $bg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.submitbtn');
    }
}
